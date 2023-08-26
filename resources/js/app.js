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
            console.log(e.item.dataset);
        }
    });
});
