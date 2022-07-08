<template>
    <Head title="Charity Program Supporter" />
    <program-layout v-bind:program="program">
		 <div class="tab-pane fade show active" id="contact" role="tabpanel" aria-labelledby="contact-tab">
			<div class="box shadow-sm border rounded bg-white p-3">
				<div class="row">
					<template v-if="program.supporters.length != 0">
						<div v-for="supporter in program.supporters" :key="supporter.id" class="col-md-3">
							<a target="_blank"
								:href="'https://rinkeby.etherscan.io/tx/' + supporter.blockchain_transaction">
								<div class="border job-item mb-3">
								<div class="d-flex align-items-center p-3 job-item-header">
									<div class="overflow-hidden me-2">
										<h6 class="font-weight-bold text-dark mb-0 text-truncate">
											<span class="fa-1x text-gray-300">₱</span>
											{{ supporter.amount }}
										</h6>
										<div class="small text-gray-500">
											{{ (supporter.is_anonymous)  
											? 'Anonymous User'  
											: supporter.benefactor.first_name + ' ' + supporter.benefactor.last_name 
											}}
										</div>
									</div>
								</div>
								<div class="p-3 job-item-footer">
									<small class="text-gray-500">
										<i class="fas fa-clock"></i>
										Donated at: {{ supporter.donated_at_formatted }}
									</small>
								</div>
							</div>
							</a>
						</div>
					</template>
					<div v-else>
						<div class="card p-3">
						<figure class="p-3 mb-0 text-center">
							<blockquote class="blockquote">
							<p>Program has no supporter yet.</p>
							</blockquote>
						</figure>
						</div>
					</div>
				</div>
			</div>
		</div>
    </program-layout>
</template>

<script setup>
import ProgramLayout from './ProgramLayout';
import { computed } from 'vue';


let props = defineProps({
  program: Array,
});
												
</script>

