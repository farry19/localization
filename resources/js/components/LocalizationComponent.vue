<template>
	<div class="border rounded rounded-md">
		<Tabs :languages="languages" />
	</div>
</template>

<script>
	import Tabs from './TabsComponent';

	export default {
		props: ['languages'],
		components: {
			Tabs
		},
		// mounted() {
		// 	axios.get('http://trans.local/languages')
		// 	.then(({data}) => {
		// 		this.languages = data.languages
		// 	})
		// }
	}
</script>