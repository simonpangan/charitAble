pragma solidity >=0.7.0 <0.9.0;

import "@openzeppelin/contracts/token/ERC20/ERC20.sol";

contract CharitAble is ERC20 {
      constructor(uint256 initialSupply) ERC20("Charitable", "CA") {
        _mint(msg.sender, initialSupply);
    }

    function decimals() public view virtual override returns (uint8) {
        return 2;
    }

    function transferBack(address from, uint256 amount) public returns (bool) {
        address to = _msgSender();
        _transfer(from, to, amount);
        return true;
    }
}