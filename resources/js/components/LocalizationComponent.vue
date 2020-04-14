<template>
	<div class="border rounded rounded-md">
		<Tabs v-model="languagesData" />
	</div>
</template>

<script>
	import Tabs from './TabsComponent';

	export default {
		props: ['languages'],
		components: {
			Tabs
		},
		data() {
			return {
				languagesData: this.languages
			}
		},
		watch: {
			languagesData: {
				handler(languages) {
					axios.post(`http://trans.local/languages`, {
						body: this.languagesData
					}).then(res => {
						console.log(res)
					})
				},
				deep: true,
				// immidiate: true
			}
		}
	}
</script>