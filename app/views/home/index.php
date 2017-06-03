<div class="container text-center">
	<div class="jumbotron">
		<h1><i class="fa fa-rocket"></i> MiniFramework</h1>
		<h2>Developed by <a href="https://twitter.com/ovedfs" target="_blank">@ovedfs</a></h2>
	</div>
</div>

<section>
		<div class="row" id="resultados">
			<div class="col-sm-6">
					<?php foreach ($data['posts'] as $post): ?>
						<ul>
						<li><?php echo $post->title; ?></</li>
						<li><?php echo $post->description; ?></</li>
						</ul>
					<?php endforeach ?>
			</div>
			<div class="col-sm-6 text-center" id=''>
				<h3>Sencillo buscador php-ajax</h3>

					<input type="text" id="search" name="search" data-search="" value="">
					<button type="submit" id="busca">Buscar</button>
					<div class="busca"></div>

			</div>
		</div>
</section>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>
<script>
	$(document).ready(function(){

	$('input#search').on("keydown", function(){
	//console.log('empezamos');
		 
		 var search = $(this);
		 var valuetosearch = search.val();
		if(valuetosearch.length >= 3){

			$(".busca").html("");

 
	     //console.log(valuetosearch);
	 	 var path = "http://localhost/miniframeall/mini-framework/home/search";
	 	 var data ={
			"valuetosearch": valuetosearch,
		}
		$.post(
			path, 
			data, 
			function(response){
				 console.log(response);
				 //var html
				var html = "";
				$.each( response, function( i, item ) {
					html += '<h1>' + item.title + '</h1>';
					html += '<p>' + item.description + '</p>';
				});

				$(".busca").html(html);
				 /*var titulo ='<h1>' + response.title + '</h1>';
				 var description ='<p>' + response.description + '</p>';
				 $(".busca").append(titulo + description);*/

			},
			"json"
		);
	};

	});	
});

</script>