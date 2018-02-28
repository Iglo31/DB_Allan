/* Modell must be the third column in the table */

$(document).ready(function() {
	"use strict";

	/* Delete button is being clicked */
	$(".db-table .delete-trigger").each(function(i, el) {
		$(el).on("click", function() {
		var modellName = $(this).parent().parent().find("td").eq(2).html();
		$("#delete-modal #modell-name").html(modellName);
		$("#delete-modal form input[name='modell_delete']").val(modellName);
		$("#delete-modal").modal();
		});
	});
	$("#delete-modal .delete-confirmation").on("click", function() {
		$("#delete-modal form").submit();
	})

	/* Edit button is being clicked */
	$(".db-table .edit-trigger").each(function(i, el) {
		$(el).on("click", function() {
		var modellName = $(this).parent().parent().find("td").eq(2).html();
		window.alert(modellName);
		// Action ...
		});
	});

	/* New Entry button is being clicked */
	$("#new-entry-trigger").on("click", function() {
		$("#new-entry-modal").modal();
		window.setTimeout(function() {$("#new-entry-modal input").eq(0).focus();}, 200);
	});

});