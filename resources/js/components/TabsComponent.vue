<template>
	<div>
		<ul class="nav nav-tabs">
			<li
				v-for="(language, index) in more"
				class="col-md-2"
				:key="index"
				:class="{'active': currentIndex == index}"
				style="padding: 0 1px;">

				<a
					style="padding-bottom: 0; margin: 0 0 1px 0"
					href="#"
					:style="{'background-color': currentIndex == index ? '#337ab7' : '#ffffff'}"
					@click.prevent="remove(index, 'change')">
					<div class="input-group input-group-sm">
						<input type="text" class="form-control" v-model="more[index].name" placeholder="Language Name">
						<span class="input-group-btn">
							<button
								@click.prevent="remove(index, 'remove')"
								class="btn btn-danger">
								<i class="glyphicon glyphicon-remove"></i>
							</button>
						</span>
					</div>
				</a>

				<portal
					v-if="currentIndex == index"
					:key="`p-${index}`"
					to="tab-contents">
					<div class="tab-pane fade in active">
						<div class="col-sm-12" style="padding: 10px 0; border: 1px dashed #ccc; border-radius: 4px;">
							<div class="col-sm-2">
								<label>Short Name</label>
								<input
									type="text"
									class="form-control input-sm"
									v-model="more[index].short_name"
									placeholder="en / ar / ur">
							</div>

							<div class="col-sm-2">
								<label>Text Direction</label>
								<input
									type="text"
									class="form-control input-sm"
									v-model="more[index].text_direction"
									placeholder="rtl / ltr">
							</div>

							<div class="col-sm-2">
								<label>Text Align</label>
								<input
									type="text"
									class="form-control input-sm"
									v-model="more[index].text_align"
									placeholder="left / right / center">
							</div>

							<div class="col-sm-2">
								<label>Flex Direction</label>
								<input
									type="text"
									class="form-control input-sm"
									v-model="more[index].flex_direction"
									placeholder="start / end">
							</div>
						</div>

						<div class="col-sm-12 text-right" style="margin: 10px 0; padding: 0;">
							<button
								@click="updateLanguages"
								class="btn btn-success btn-sm">
								Update
							</button>
						</div>

						<div
							class="col-sm-12"
							style="padding: 10px 0; margin-top: 10px; border: 1px dotted #999; border-radius: 4px;">
							<div
								v-for="(pair, pindex) in language.pairs"
								:key="`pa-${pindex}`">
								<div class="col-sm-5">
									<label>Key</label>
									<input
										type="text"
										class="form-control input-sm"
										v-model="language.pairs[pindex].key"
										placeholder="Key">
								</div>

								<div class="col-sm-5">
									<label>Value</label>
									<input
										type="text"
										class="form-control input-sm"
										v-model="language.pairs[pindex].value"
										placeholder="Value">
								</div>

								<div class="col-sm-2">
									<label class="col-sm-12">&nbsp;</label>
									<button
										v-if="pindex == 0"
										@click.prevent="addPair(index)"
										class="btn btn-success btn-xs">
										<i class="glyphicon glyphicon-plus"></i>
									</button>

									<button
										@click.prevent="removePair(index, pindex)"
										class="btn btn-danger btn-xs">
										<i class="glyphicon glyphicon-minus"></i>
									</button>
								</div>
							</div>
						</div>
					</div>
				</portal>

			</li>
			<li>
				<a
					href="#"
					class="glyphicon glyphicon-plus"
					@click.prevent="add">
				</a>
			</li>

		</ul>

		<div class="tab-content">
			<portal-target name="tab-contents"></portal-target>
		</div>
	</div>
</template>

<script>
	export default {
		props: ['languages'],
		data() {
			return {
				more: this.languages,
				currentIndex: 0,
				action: null
			}
		},
		methods: {
			add() {
				this.currentIndex = this.more.length
				this.more.push({
					'name': '', 
					'short_name': '',
					'text_direction': '',
					'text_align': '',
					'flex_direction': '', 
					'pairs': [
						{
							key: '',
							value: ''
						}
					]
				})

			},
			remove(index, action) {
				if(action == 'remove') {
					this.action = action
					this.more.splice(index, 1)
					this.currentIndex = this.more.length - 1
				} else if(this.action == 'remove') {
					this.action = null
				} else {
					this.currentIndex = index
				}

			},
			addPair(index) {
				this.more[index].pairs.unshift({
					key: '',
					value: ''
				})
			},
			removePair(index, pindex) {
				this.more[index].pairs.splice(pindex, 1)
			},
			updateLanguages() {
				// update api call
			}
		},
		watch: {
			languages: function(newVal) {
				this.more = newVal

				_.each(this.more, (m, index) => {
					if(!m.pairs.length) {
						this.more[index].pairs.unshift({
							key: '',
							value: ''
						})
					}
				})
			}
		}
	}
</script>