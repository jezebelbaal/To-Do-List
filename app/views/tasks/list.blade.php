<HTML>
	<head>
		<title>Lista de tarefas</title>
		
	</head>
	<body>
		<h1>Lista de tarefas</h1>
		{{ HTML::linkAction('TasksController@create', 'Adicionar Nova') }}

		<ul>

			<?php foreach($tasks as $task):?>
				<li> 
					<?php 

						echo $task->title;

						//verifica se tarefa foi feita
						if($task->status==true){
							echo '[Feita] ';
						}
						else{

							//se não foi feita, verifica o prazo.
							if (date("Y-m-d")<$task->deadline){
								echo ' - Ainda no prazo. - ';
							}

							else{

								echo ' - Fora do prazo. - ';
							}
					?> 

					<a href="done?id=<?php echo $task->id ?>">[Marcar como feita]</a>
					<?php } ?>

					<a href="delete?id=<?php echo $task->id ?>">[Apagar]</a>
				</li>
			<?php endforeach ?>

		</ul>
	</body>
</HTML>