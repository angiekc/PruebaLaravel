<template>
	<section class="container">
		<div class="row">
			<header>
				<div v-if="edit === false">
					<h1>Crear Categoría</h1>					
				</div>
				<div v-else>					
					<h1>Editar Categoría</h1>
				</div>
			</header>
			<article class="col-md-10 col-md-offset-1">
				<form novalidate @submit.prevent="validateForm()">
					<div class="form-group">
						<label>Nombre</label>
						<input type="text" v-model="name" class="form-control" required>
					</div>
					<div class="form-group" v-if="edit === true">
						<label>Estado</label>
						<select v-model="state" class="form-control">
							<option value="">Seleccione</option>
							<option value="1">Activo</option>
							<option value="2">Inactivo</option>
						</select>
					</div>					
					<div class="form-group">
						<button class="btn btn-success">Enviar</button>
					</div>
				</form>
			</article>
		</div>	
	</section>
</template>

<script>
	export default {
		data: function() {
			return {
				name: "",
				state: ""
			}
		},
		props: ['category','edit'],
		methods: {
			validateForm() {
				if(this.edit === false)
					this.newCategory()
				else
					this.editCategory()
			},
			newCategory() {
				axios.post('store', {
				    name: this.name,
				})
				.then(function (response) {
				    window.location.href = '/admin/category'
				})
				.catch(function (error) {
				    console.log(error);
				});
			},
			editCategory() {
				axios.put('../update', {
				    name: this.name,
				    state: this.state,
				    id: this.category.id
				})
				.then(function (response) {
				    window.location.href = '/admin/category'
				})
				.catch(function (error) {
				    console.log(error);
				});
			}
		},
		mounted() {
			this.name = this.edit === true ? this.category.name : ""
			this.state = this.edit === true ? this.category.state_id : ""
		}
	}
</script>