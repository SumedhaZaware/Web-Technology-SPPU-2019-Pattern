pragma solidity 0.8.7;
contract student{
    struct Student{
        int rollno;
        string fname;
        string lname;
        int marks;
    }

    address owner;
    int public stdcount = 0;
    mapping(int => Student) public stdRecords;

    constructor() public{
        owner = msg.sender;
    }

    function addNewRecords(int roll, string memory fname, string memory lname, int marks) public {
        stdcount = stdcount + 1;
        stdRecords[stdcount] = Student(roll, fname, lname, marks);
    }

    function bonusMarks(int bonus) public {
        stdRecords[stdcount].marks = stdRecords[stdcount].marks+bonus;
    }

    fallback() external payable{
    //executed when none of the other functions match the function or no data is provided with the function call.
    }

}
