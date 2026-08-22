<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Event;
use App\Models\Process;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class EventController extends Controller
{
    /**
     * GET /api/events
     * Retorna eventos para o FullCalendar (suporta filtros de data)
     */
    public function index(Request $request): JsonResponse
    {
        $query = Event::with(['process', 'user']);

        // Suporta filtros de data do FullCalendar
        if ($request->filled('start')) {
            $query->where('start_date', '>=', $request->start);
        }
        if ($request->filled('end')) {
            $query->where('start_date', '<=', $request->end);
        }

        $events = $query->orderBy('start_date', 'asc')->get();

        return response()->json([
            'success' => true,
            'data' => $events->map(fn($e) => $e->toFullCalendarArray()),
        ]);
    }

    /**
     * GET /api/events/{id}
     */
    public function show(int $id): JsonResponse
    {
        $event = Event::with(['process', 'user'])->findOrFail($id);

        return response()->json([
            'success' => true,
            'data' => [
                'id' => $event->id,
                'title' => $event->title,
                'description' => $event->description,
                'start_date' => $event->start_date->toIso8601String(),
                'end_date' => $event->end_date?->toIso8601String(),
                'all_day' => $event->all_day,
                'event_type' => $event->event_type,
                'event_type_label' => $event->event_type_label,
                'color' => $event->color ?? $event->event_type_color,
                'location' => $event->location,
                'notes' => $event->notes,
                'process_id' => $event->process_id,
                'process_number' => $event->process?->process_number,
                'user_id' => $event->user_id,
                'user_name' => $event->user?->name,
            ],
        ]);
    }

    /**
     * POST /api/events
     */
    public function store(Request $request): JsonResponse
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'start_date' => 'required|date',
            'end_date' => 'nullable|date|after_or_equal:start_date',
            'all_day' => 'boolean',
            'event_type' => 'required|in:hearing,meeting,deadline,task,other',
            'color' => 'nullable|string|max:7',
            'process_id' => 'nullable|exists:processes,id',
            'location' => 'nullable|string|max:255',
            'notes' => 'nullable|string',
        ]);

        $validated['user_id'] = Auth::id();

        $event = Event::create($validated);

        return response()->json([
            'success' => true,
            'message' => 'Evento criado com sucesso!',
            'data' => $event->toFullCalendarArray(),
        ], 201);
    }

    /**
     * PUT /api/events/{id}
     */
    public function update(Request $request, int $id): JsonResponse
    {
        $event = Event::findOrFail($id);

        $validated = $request->validate([
            'title' => 'sometimes|required|string|max:255',
            'description' => 'nullable|string',
            'start_date' => 'sometimes|required|date',
            'end_date' => 'nullable|date',
            'all_day' => 'boolean',
            'event_type' => 'sometimes|required|in:hearing,meeting,deadline,task,other',
            'color' => 'nullable|string|max:7',
            'process_id' => 'nullable|exists:processes,id',
            'location' => 'nullable|string|max:255',
            'notes' => 'nullable|string',
        ]);

        $event->update($validated);

        return response()->json([
            'success' => true,
            'message' => 'Evento atualizado com sucesso!',
            'data' => $event->toFullCalendarArray(),
        ]);
    }

    /**
     * PATCH /api/events/{id}/date
     * Atualiza apenas a data (para drag & drop no mobile)
     */
    public function updateDate(Request $request, int $id): JsonResponse
    {
        $event = Event::findOrFail($id);

        $validated = $request->validate([
            'start' => 'required|date',
            'end' => 'nullable|date',
            'all_day' => 'boolean',
        ]);

        $event->update([
            'start_date' => $validated['start'],
            'end_date' => $validated['end'] ?? null,
            'all_day' => $validated['all_day'] ?? false,
        ]);

        return response()->json([
            'success' => true,
            'message' => 'Data atualizada!',
            'data' => $event->toFullCalendarArray(),
        ]);
    }

    /**
     * DELETE /api/events/{id}
     */
    public function destroy(int $id): JsonResponse
    {
        $event = Event::findOrFail($id);
        $event->delete();

        return response()->json([
            'success' => true,
            'message' => 'Evento excluído com sucesso!',
        ]);
    }

    /**
     * GET /api/events/types
     * Retorna tipos de eventos disponíveis
     */
    public function types(): JsonResponse
    {
        return response()->json([
            'success' => true,
            'data' => [
                ['value' => 'hearing', 'label' => 'Audiência', 'color' => '#dc2626'],
                ['value' => 'meeting', 'label' => 'Reunião', 'color' => '#2563eb'],
                ['value' => 'deadline', 'label' => 'Prazo', 'color' => '#f59e0b'],
                ['value' => 'task', 'label' => 'Tarefa', 'color' => '#10b981'],
                ['value' => 'other', 'label' => 'Outro', 'color' => '#6b7280'],
            ],
        ]);
    }
}
