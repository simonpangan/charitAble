require('dotenv').config();
const { INFURA_API_URL } = process.env;

import Web3 from "web3";

let web3;

if (typeof window !== 'undefined' && typeof window.ethereum !== 'undefined') {
    // we are in the browser && metamask is running
    web3 = new Web3(window.ethereum);
    window.ethereum.request({ method: "eth_requestAccounts" });
} else {
    // we are on the server OR the user is not running metamask     
    const provider = new Web3.providers
        .HttpProvider(INFURA_API_URL);
    web3 = new Web3(provider);
}

export default web3;