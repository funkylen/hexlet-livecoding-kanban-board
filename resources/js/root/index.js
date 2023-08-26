/**
 * Берём все формы карточек
 */
const addCardForms = $('[id*="add-card-form-"]');

for (const formElement of addCardForms) {
    const form = $(formElement);
    form.on('submit', (event) => {
        /**
         * Отменяем HTML-действие формы по-умолчанию
         */
        event.preventDefault();

        /**
         * Собираем данные из формы
         */
        const body = {
            column_id: form.find('input[name="column_id"]').val(),
            title: form.find('input[name="title"]').val(),
            description: form.find('textarea[name="description"]').val(),
        };

        /**
         * Делаем AJAX-запрос на создание карточки
         */
        const response = $.ajax({
            url: "/api/cards",
            method: "POST",
            data: body,
        });

        // TODO: Сделать появление карточки в колонке
        response.done((data) => {
            const currentColumn = $('#column-' + form.data('column-id'));
            const container = currentColumn.find('.drag-items').first();
            const card = currentColumn.find('.card').first().clone();

            container.append(card);
            console.log(card);
        });

        // TODO: Обработка ошибки
        // request.fail(function (jqXHR, textStatus) {
        //     alert("Request failed: " + textStatus);
        // });

    });
}
