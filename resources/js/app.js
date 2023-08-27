import './bootstrap';
import Sortable from "sortablejs";

/**
 * jQuery
 * Получаем все ХТМЛ-блоки с зонами для перетаскивания элементов
 * В нашем случае это часть колонок с карточками
 *
 * На каждый такой блок вешается плагин Sortable - подробнее в документации
 *
 * onEnd - функция, которая срабатывает после того, как отпускаем карточку
 */
$('.drag-items').each(function() {
    new Sortable(this, {
        group: 'shared',
        animation: 150,
        draggable: '.card',
        onEnd: function(e) {
            // Находим ID колонки куда переместилась карточка
            const columnId = $(e.to).parent().data('id');
            // Берём ID карточки
            const cardId = $(e.item).data('id');
            // Если всё есть, то отправляем AJAX запрос на изменение карточки (в тело запроса кладём ID колонки)
            if (columnId && cardId) {
                const body = {
                    column_id: columnId,
                };

                $.ajax({
                    url: "/api/cards/" + cardId,
                    method: "PATCH",
                    data: body,
                });
            }
        }
    });
});
