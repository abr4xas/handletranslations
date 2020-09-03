<template>
	<div>
		<heading class="mb-6">Traducciones del sistema</heading>

		<card class="flex flex-col" style="min-height: 100px">
			<div
				class="text-black-50% text-lg"
				style="margin:20px;margin-bottom:20px"
			>
				Desde acá se puede gestionar las traducciones del sista, solo se
				debe hacer clic en el siguiente botón:
				<br />
				<button
					@click="openSheet"
					class="btn btn-default btn-primary"
					style="margin-top:20px"
				>
					Mostrar enlace de Traducciones
				</button>
				<br />
				<br />
				<p
					v-html="response"
					style="margin-left:10px;margin-bottom:20px"
				></p>
				<div v-show="response" class="pull-translations">
					<p style="margin-left:10px;margin-bottom:20px">
						Luego de hacer todos los cambios en el archivo de
						traducción haga clic en este botón:
					</p>
					<button
						@click="pullSheet"
						class="btn btn-default btn-primary"
						style="margin-top:20px"
					>
						Bajar traducciones del archivo de excel
					</button>
					<br />
					<br />
					<p
						v-html="process"
						style="margin-left:10px;margin-bottom:20px"
					></p>
				</div>
			</div>
		</card>
	</div>
</template>

<script>
export default {
	data() {
		return {
			response: "",
			process: ""
		};
	},
	methods: {
		openSheet() {
			Nova.request()
				.post("/nova-vendor/handleTranslations/open")
				.then(data => {
					this.response = data.data.message;
				});
		},
		pullSheet() {
			Nova.request()
				.post("/nova-vendor/handleTranslations/pull")
				.then(data => {
					this.process = data.data.message;
				});
		}
	}
};
</script>

<style>
/* Scoped Styles */
</style>
