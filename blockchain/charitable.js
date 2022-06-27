import web3 from "./web3";
const { abi } = require("./build/contracts/CharitAble.json");

const charitableContract = (address) => {
    return new web3.eth.Contract(abi, address);
};

export default charitableContract;