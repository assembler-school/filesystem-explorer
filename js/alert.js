const alertPlaceholder = document.getElementById('liveAlertPlaceholder');

const custom_alert = (message, type) => {
  const wrapper = document.createElement('div')
  wrapper.innerHTML = [
    `<div class="alert alert-${type} alert-dismissible mt-3 col-2 offset-md-5" role="alert">`,
    `   <div class="fw-bold">${message}</div>`,
    '   <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>',
    '</div>'
  ].join('');
  alertPlaceholder.append(wrapper);

  setTimeout(() => {
    alertPlaceholder.firstChild.remove();
  }, 2000);
}