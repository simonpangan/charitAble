import Web3 from 'web3/dist/web3.min.js';

let web3;
const provider = new Web3.providers
    .HttpProvider("https://rinkeby.infura.io/v3/7e4a83640a004d40be88e9e184c3ee9f");
web3 = new Web3(provider);

export default web3;