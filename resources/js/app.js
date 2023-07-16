import './bootstrap';
import Sortable from "sortablejs";

const els = document.getElementsByClassName('drag-items');

Array.from(els).forEach((el) => {
    new Sortable(el, {
        group: 'shared',
        animation: 150,
        draggable: '.card',
        onEnd: function(e) {
            console.log(e.item.dataset);
        }
    });
});
