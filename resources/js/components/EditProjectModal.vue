<template>
	<modal name="edit-project" classes="p-10 bg-card rounded-lg" height="auto">
		<h1 class="font-normal mb-16 text-center text-2xl">Let's Start Something New</h1>

		<form @submit.prevent="submit">
			<div class="mb-4">
				<label for="title" class="text-sm block mb-2">Title</label>
				<input type="text" id="title" class="border p-2 text-xs block w-full rounded" :class="form.errors.title ? 'border-error' : 'border-muted-light'" v-model="form.title" @keydown="form.removeError('title')">
				<span class="text-xs italic text-error" v-if="form.errors.title" v-text="form.errors.title[0]"></span>
			</div>

			<div class="mb-4">
				<label for="description" class="text-sm block mb-2">Description</label>
				<textarea id="description" class="border p-2 text-xs block w-full rounded" rows="7"  :class="form.errors.description ? 'border-error' : 'border-muted-light'" v-model="form.description" @keydown="form.removeError('description')"></textarea>
				<span class="text-xs italic text-error" v-if="form.errors.description" v-text="form.errors.description[0]"></span>
			</div>

			<footer class="flex justify-end">
				<button type="button" class="button is-outlined mr-4" @click="$modal.hide('edit-project')">Cancel</button>
				<button class="button">Edit Project</button>
			</footer>
		</form>
	</modal>
</template>

<script>
	import BirdboardForm from './BirdboardForm';

	export default {
		data() {
            return {
                form: new BirdboardForm({
                    title: this.project.title,
                    description: this.project.description
                })
            };
        },

        props: ['project'],

        created() {
        	this.form.errors = {};
        },

        methods: {
             async submit() {
                this.form.patch('/projects/' + this.project.id)
                	.then(response => location = response.data.message);
            }
        }
	}
</script>