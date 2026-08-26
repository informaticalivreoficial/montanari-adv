/**
 * FullCalendar - Helper para integração com Livewire
 *
 * Exposes window.initFullCalendar(containerEl, options)
 */

import { Calendar } from '@fullcalendar/core';
import dayGridPlugin from '@fullcalendar/daygrid';
import interactionPlugin from '@fullcalendar/interaction';
import ptBrLocale from '@fullcalendar/core/locales/pt-br';

window.initFullCalendar = function (containerEl, options = {}) {
    if (containerEl._fullCalendarInstance) {
        containerEl._fullCalendarInstance.destroy();
    }

    const calendar = new Calendar(containerEl, {
        plugins: [dayGridPlugin, interactionPlugin],
        initialView: options.initialView || 'dayGridMonth',
        locale: ptBrLocale,
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
            // Dispara evento DOM que o listener $listeners do componente captura.
            // O "detail" DEVE ser um array (argumentos do método) por causa do
            // unpack "...$params" usado pelo __dispatch do Livewire 4.
            window.dispatchEvent(new CustomEvent('openDateModal', { detail: [info.dateStr] }));
        },
        eventClick: function (info) {
            window.dispatchEvent(new CustomEvent('openEventModal', { detail: [info.event.id] }));
        },
        eventDrop: function (info) {
            window.dispatchEvent(new CustomEvent('updateEventDate', {
                detail: [
                    info.event.id,
                    info.event.startStr,
                    info.event.end ? info.event.endStr : null,
                    info.event.allDay,
                ],
            }));
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
