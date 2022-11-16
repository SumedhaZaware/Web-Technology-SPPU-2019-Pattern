// SPDX-License-Identifier: GPL-3.0
pragma solidity 0.8.7;
contract bank{
    address public owner;
    mapping(address=>uint256) private userbalance;

    constructor() public{
        owner=msg.sender;
    }

    function deposits() public payable returns(bool){
        require(msg.value>10 wei,"please minimum amount is 10wei");
        userbalance[msg.sender]+=msg.value;
        return true;
    }

    function withdraw(uint256 _amount) public payable returns(bool){

        require(_amount<=userbalance[msg.sender],"No balance");
        userbalance[msg.sender]-=_amount;
        payable(msg.sender).transfer(_amount);
        return true;
    }

    function getbalance() public view returns(uint256){
        return userbalance[msg.sender];
    }
}
