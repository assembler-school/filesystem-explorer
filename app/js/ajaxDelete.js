function ajaxDelete(fileUrl) {
	$.ajax({
		url: '../../app/php/deleteFile.php',
		type: 'post',
		data: {
			filePath: fileUrl,
		},
		success: function (response) {
			console.log(response)
			if (response) {
				Swal.fire({
					icon: 'success',
					title: 'File deleted',
					showConfirmButton: false,
					timer: 1500,
				})
				//?recharge table
				loadTable()
			} else {
				Swal.fire({
					icon: 'error',
					title: 'Oops...',
					text: 'Something went wrong!',
				})
			}
		},
	})
}
