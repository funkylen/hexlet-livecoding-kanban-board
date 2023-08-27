/**
* Блок кода из документации бутстрапа 1. Находим модалку
* 2. Если она существует, тогда вешаем логику на открытие модалки, по нажатию кнопки
* 3. Логика: из кнопки забираем ID колонки и вставляем этот ID в скрытый инпут формы (column_id)
*
* Далее: вешаем на форму в модалке действие на подтверждение формы
*/
const modal = document.getElementById('add-card-modal');
if (modal) {
    modal.addEventListener('show.bs.modal', (event) => {
        const button = $(event.relatedTarget);
        const columnId = button.data('column-id');

        const input = $('#add-card-modal--column-id');
        input.val(columnId);
    });

    $('#add-card-form').on('submit', (event) => {
        /**
         * Отменяем HTML-действие формы по-умолчанию
         */
        event.preventDefault();

        /**
         * Собираем данные из формы
         */

        const columnIdEl = $('#add-card-modal--column-id');
        const titleEl = $('#add-card-modal--title');
        const descriptionEl = $('#add-card-modal--description');

        const body = {
            column_id: columnIdEl.val(),
            title: titleEl.val(),
            description: descriptionEl.val(),
        };

        /**
         * Делаем AJAX-запрос на создание карточки
         */
        const response = $.ajax({
            url: "/api/cards",
            method: "POST",
            data: body,
        });

        // появление карточки в колонке после успешного выполнения запроса
        response.done((data) => {
            /**
            * Ищем пустой шаблон карточки на странице
            * Клонируем его
            * Вставляем заголовок и описание
            * Добавляем аттрибут с идентификтаром
            * Находим колонку, закдиваем в зону перетаскивания карточку, и показываем карточку
            */
            const cardTemplate = $('#templates').find('.card').first();
            console.log(cardTemplate)
            const card = cardTemplate.clone();
            const cardBody = card.find('.card-body').first();
            cardBody.find('h5').append(data.title);
            cardBody.find('p').append(data.description);
            card.attr('data-id', data.id);

            const column = $('#column-' + data.column_id);
            if (column) {
                const container = column.find('.drag-items').first();

                container.append(card);
                card.show();
            }

            /**
            * Чистим поля формы
            */
            columnIdEl.val(null);
            titleEl.val(null);
            descriptionEl.val(null);

            /**
             * NOTE: Исправленный код по скрытию модального окна
             * jQuery не срабатыает скорее всего по причине того, что он полностью выпилен из Bootstrap :(
             * Код new bootstrap.Modal(modal).hide() работает, но его проблема в том, что он создаёт новый элемент, который сразу прячет
             * Код ниже получает конкретный открытый элемент и работает уже с ним
             * Документация не говорит об этом напрямую, но если прочитать подробно что делает каждый доступный метод, становится понятно
             */
            bootstrap.Modal.getInstance(modal).hide();
        });

        // TODO: Обработка ошибки
        // request.fail(function (jqXHR, textStatus) {
        //     alert("Request failed: " + textStatus);
        // });

    });

}
