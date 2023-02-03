
function new_alert(i, title, text, btn, time, timer) {
  Swal.fire({
    position: 'center',
    icon: i,
    title: title,
    text: text,
    showConfirmButton: btn,
    timer: time,
    timerProgressBar: true
  });
}