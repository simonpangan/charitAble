var CharitAble = artifacts.require("./CharitAble.sol");

module.exports = function(deployer) {
    return deployer.deploy(CharitAble, 1000000000);
};