import Web3 from 'web3/dist/web3.min.js';

let web3;

if (typeof window !== 'undefined' && typeof window.ethereum !== 'undefined') {
    // we are in the browser && metamask is running
    web3 = new Web3(window.ethereum);
    // window.ethereum.request({ method: "eth_requestAccounts" });
} else {
    // we are on the server OR the user is not running metamask     
    const provider = new Web3.providers
        .HttpProvider("https://rinkeby.infura.io/v3/7e4a83640a004d40be88e9e184c3ee9f");
    web3 = new Web3(provider);
}

export default web3;