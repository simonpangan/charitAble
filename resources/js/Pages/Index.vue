<template>
	{{ $domain }}
</template>

<script>
import charitableContract from "~blockchain/charitable.js";
import web3 from "~blockchain/web3.js";
export default {
	async created() {
		console.log(await charitableContract.methods
			.balanceOf("0x9a42C53cf833fa5011d46C8C0AEBe684aB493f2b").call());
	
		const tx = {
			from : "0x9a42C53cf833fa5011d46C8C0AEBe684aB493f2b", //payee
			to: "0xFaAe17Ac63D320903C4bC8600e45cB721D70722c",  //contract address
			gas: 50000,
			// data: charitableContract.methods.transfer(
			// 		"0x8C311d6B0851642Af706613AeF8c032adfC87FEf", 100
			// 	).encodeABI() 
			data: charitableContract.methods.transferFrom(
					"0x8C311d6B0851642Af706613AeF8c032adfC87FEf", 
					"0x9a42C53cf833fa5011d46C8C0AEBe684aB493f2b",
					8600
				).encodeABI() 
			}	

		const signature = await web3.eth.accounts.signTransaction(
			tx, "9a79ead2b40a2ada662e6a775b5454d89913b9ebb3253a954a16f03abf234b90" //private key
		);

		web3.eth.sendSignedTransaction(signature.rawTransaction)
			.on('receipt', console.log);

		console.log(await charitableContract.methods
			.balanceOf("0x9a42C53cf833fa5011d46C8C0AEBe684aB493f2b").call());
			
		console.log(await charitableContract.methods
			.balanceOf("0x8C311d6B0851642Af706613AeF8c032adfC87FEf").call());
	},
}
</script>