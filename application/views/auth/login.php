<div class="ui middle aligned center aligned grid">
  	<div class="column">
		<h2 class="ui teal image header">
			<div class="content">
				Entre com sua conta
			</div>
		</h2>
		<?=form_open($action, array('class' => 'ui large form', 'autocomplete' => 'off'))?>
			<div class="ui error message">
				<?=validation_errors()?>
			</div>
			<div class="ui segment">
				<div class="field">
					<div class="ui left icon input">
						<i class="user icon"></i>
						<input type="text" name="username" placeholder="E-mail">
					</div>
				</div>
				<div class="field">
					<div class="ui left icon input">
						<i class="lock icon"></i>
						<input type="password" name="password" placeholder="Senha">
					</div>
				</div>
				<button type="submit" class="ui fluid large teal submit button">Entrar</button>
			</div>
		<?=form_close()?>
  	</div>
</div>