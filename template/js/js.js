function loadModels($this) {
	$this.closest('.makeLi').addClass('openMake');
	$makeID=$this.data('model');
	$.ajax({
		type: "POST",
		url: "/models/"+$makeID,
		success: function (data) {
			$this.closest('li').append(data);
		}
	});
};
function closeModels($this) {
	$this.closest('li').find('.modelsList').remove();
	$this.closest('.makeLi').removeClass('openMake');
}
$(document).ready(function () {
	$('.makesList li .make').click(function (e) {
		e.preventDefault();
		$this=$(this);
		(!$(this).closest('.makeLi').hasClass('openMake')) ? loadModels($this) : closeModels($this);
	})

});