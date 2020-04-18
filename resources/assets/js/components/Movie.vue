<template>
	<section class="container">
		<div class="row">
			<article class="col-md-10 col-md-offset-1">
				<form novalidate @submit.prevent="validateForm">				
					<div class="form-group">
						<label>Nombre</label>
						<input type="text" name="Nombre" class="form-control" v-model="name" v-validate="'required|alpha_spaces'">
						<span>{{ errors.first('Nombre') }}</span>
					</div>
					<div class="form-group">
						<label>Descripción</label>
						<input type="text" name="Descripción" class="form-control" v-model="description" v-validate="'required|alpha_spaces'">
						<span>{{ errors.first('Descripción') }}</span>
					</div>
					<div class="form-group">
						<label>Categorías</label>
						<select v-model="category" class="form-control">
							<option value="">Seleccione</option>
							<option v-for="(category,index) in categories" :value="category">{{category.name}}</option>
						</select>
						<a class="btn btn-success" @click="addCategory">Agregar</a>
					</div>
					<div class="form-group col-md-12">
						<div class="row" v-for="(category,index) in this.listCategories">
							<div class="col-md-4">
								{{ category.name }}
							</div>
							<div class="col-md-4">
								<a @click="removeCategory(index)">X</a>
							</div>
						</div>
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
		data: function () {
			return {
				name: "",
				description: "",
				category: "",
				listCategories: []
			}
		},
		props: ['edit','categories'],		
		methods: {
			validateForm: function () {
				this.$validator.validateAll().then(result => {
          			if(result) {
          				if(this.edit === false)
          					this.newMovie()
          				else
          					this.editMovie()
          			}
        		})
			},
			newMovie: function () {
				axios.post('store', {
					name: this.name,
					description: this.description,
					listCategories: this.listCategories
				})
				.then(response => {
					window.location.href = "/admin/movie"
				})
				.catch(error => {
					console.log(error)
				})
			},
			editMovie: function () {
				console.log("editando")
			},
			addCategory: function () {								
				if(_.findIndex(this.listCategories, {'id':this.category.id}) < 0 ) {
					this.listCategories.push({
						"id": this.category.id,
						"name": this.category.name,					
					})		            		            
				}
			},
			removeCategory: function (index) {
				this.listCategories.splice(index, 1)
			}
		}
	}
</script>