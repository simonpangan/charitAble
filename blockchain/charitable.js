import web3 from "./web3";
import address from "./contract-address";
const { abi } = require("./build/contracts/CharitAble.json");

const charitableContract = new web3.eth.Contract(
	abi, address
);

export default charitableContract;
