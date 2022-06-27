import web3 from "./web3";
const { abi } = require("./build/contracts/CharitAble.json");

const charitableContract = new web3.eth.Contract(abi, '0xFaAe17Ac63D320903C4bC8600e45cB721D70722c');

export default charitableContract;
