$(document).ready(function(){
	recupTacheEnCour();
	recupTacheAccompli()
	$('#formulaire').submit(function(e){
		e.preventDefault();
		var nom = $('#nom').val();
		
		$.post(
			'send.php',
			{
				nom:nom
			}, 
			function(donnees){
				
				$('#nom').val('');
				recupTacheEnCour();
			});

	});

	function recupTacheEnCour()
	{
		$.post(
			'recupTacheEnCour.php',
			function(data){
				
				$('#tacheEnCour').html(data);

			});
	}

	$(document).on("click", ".cancelTache", function() {
		var id = this.id;
		$.post(
			'deleteTache.php',
			{
				idTache:id,
				cancelTache:"go"
			},
			function(event){
				
			});

	});

	$(document).on("click", ".updateTache", function() {
		var id = this.id;
		$.post(
			'updateTache.php',
			{
				idTache:id,
				updateTache:"go"
			},
			function(event){
				recupTacheAccompli()
			});

	});

	function recupTacheAccompli()
	{
		$.post(
			'recupTacheAccompli.php',
			function(tache){
				
				$('#tacheAccompli').html(tache);
				
			});
	}

	setInterval(recupTacheEnCour,500);
	setInterval(recupTacheAccompli,500);

});