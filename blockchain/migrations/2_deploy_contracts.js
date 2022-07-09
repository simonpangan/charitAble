var CharitAble = artifacts.require("./CharitAble.sol");

module.exports = function(deployer) {
    var initialSupply = 1000000000000;

    return deployer.deploy(CharitAble, initialSupply.toString());
};