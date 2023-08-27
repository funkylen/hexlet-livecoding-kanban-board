/**
 * Блок кода из документации бутстрапа
 * 1. Находим модалку
 * 2. Если она существует, тогда вешаем логику на открытие модалки, по открытию карточки
 * 3. Логика: из карточки забираем ID карточки и сделаем AJAX запрос для отображения актуальных данных в модалке
 */
const modal = document.getElementById('card-modal');
if (modal) {
  modal.addEventListener('show.bs.modal', (event) => {
    const card = $(event.relatedTarget);
    const id = card.data('id');

    /**
     * AJAX-запрос на получение актуальных данных карточки
     */
    const response = $.ajax({
        url: "/api/cards/" + id,
        method: "GET",
    });

    /**
    * Подставляем в модалку актуальные данные карточки
    */
    response.done((data) => {
        $('#card-modal--title').empty().append(data.title);

        $('#card-modal--description').empty().append(data.description);
    });
  });
}

