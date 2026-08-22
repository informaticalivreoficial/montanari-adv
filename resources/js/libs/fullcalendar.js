/**
 * FullCalendar - Helper para integração com Livewire
 *
 * Exposes window.initFullCalendar(containerEl, options)
 */

import { Calendar } from '@fullcalendar/core';
import dayGridPlugin from '@fullcalendar/daygrid';
import interactionPlugin from '@fullcalendar/interaction';

window.initFullCalendar = function (containerEl, options = {}) {
    if (containerEl._fullCalendarInstance) {
        containerEl._fullCalendarInstance.destroy();
    }

    const calendar = new Calendar(containerEl, {
        plugins: [dayGridPlugin, interactionPlugin],
        initialView: options.initialView || 'dayGridMonth',
        locale: 'pt-br',
        headerToolbar: options.headerToolbar || {
            left: 'prev,next today',
            center: 'title',
            right: 'dayGridMonth,dayGridWeek,dayGridDay',
        },
        events: options.events || [],
        editable: true,
        selectable: true,
        dayMaxEvents: true,
        nowIndicator: true,
        buttonText: {
            today: 'Hoje',
            month: 'Mês',
            week: 'Semana',
            day: 'Dia',
        },
        dateClick: function (info) {
            // Emit to Livewire
            const livewireComponent = containerEl.closest('[wire\\:id]');
            if (livewireComponent) {
                const componentId = livewireComponent.getAttribute('wire:id');
                if (componentId && window.Livewire) {
                    window.Livewire.find(componentId).emit('openDateModal', info.dateStr);
                }
            }
        },
        eventClick: function (info) {
            const livewireComponent = containerEl.closest('[wire\\:id]');
            if (livewireComponent) {
                const componentId = livewireComponent.getAttribute('wire:id');
                if (componentId && window.Livewire) {
                    window.Livewire.find(componentId).emit('openEventModal', info.event.id);
                }
            }
        },
        eventDrop: function (info) {
            const livewireComponent = containerEl.closest('[wire\\:id]');
            if (livewireComponent) {
                const componentId = livewireComponent.getAttribute('wire:id');
                if (componentId && window.Livewire) {
                    window.Livewire.find(componentId).emit('updateEventDate', {
                        event_id: info.event.id,
                        start: info.event.startStr,
                        end: info.event.end ? info.event.endStr : null,
                        all_day: info.event.allDay,
                    });
                }
            }
        },
        ...options,
    });

    calendar.render();
    containerEl._fullCalendarInstance = calendar;

    return calendar;
};

window.destroyFullCalendar = function (containerEl) {
    if (containerEl && containerEl._fullCalendarInstance) {
        containerEl._fullCalendarInstance.destroy();
        containerEl._fullCalendarInstance = null;
    }
};

/**
 * Atualiza os eventos do calendário
 */
window.updateFullCalendarEvents = function (containerEl, events) {
    if (containerEl && containerEl._fullCalendarInstance) {
        const calendar = containerEl._fullCalendarInstance;
        calendar.removeAllEvents();
        calendar.addEventSource(events);
    }
};
