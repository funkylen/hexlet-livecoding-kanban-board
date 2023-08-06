const addCardForms = $('[id*="add-card-form-"]');

for (const formElement of addCardForms) {
    const form = $(formElement);
    form.on('submit', (event) => {
        event.preventDefault();

        const body = {
            column_id: form.find('input[name="column_id"]').val(),
            title: form.find('input[name="title"]').val(),
            description: form.find('textarea[name="description"]').val(),
        };

        const response = $.ajax({
            url: "/api/cards",
            method: "POST",
            data: body,
        });

        response.done((data) => {
            const currentColumn = $('#column-' + form.data('column-id'));
            const container = currentColumn.find('.drag-items').first();
            const card = currentColumn.find('.card').first().clone();

            container.append(card);
            console.log(card);
        });

        // request.fail(function (jqXHR, textStatus) {
        //     alert("Request failed: " + textStatus);
        // });

    });
}
