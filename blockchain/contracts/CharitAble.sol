pragma solidity >=0.7.0 <0.9.0;

import "@openzeppelin/contracts/token/ERC20/presets/ERC20PresetMinterPauser.sol";

contract CharitAble is ERC20PresetMinterPauser {
    constructor(uint256 initialSupply) ERC20PresetMinterPauser("CharitAble", "CA") {
        _mint(msg.sender, initialSupply);
    }
}