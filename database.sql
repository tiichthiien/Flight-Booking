CREATE DATABASE Flight_Reservation;
use Flight_Reservation;

CREATE TABLE users(
	username varchar(255),
    email varchar(255) PRIMARY KEY,
    password varchar(255)
);
CREATE TABLE Airport (
    AirCode VARCHAR(255) PRIMARY KEY,
    Name VARCHAR(255),
    City VARCHAR(255),
    State VARCHAR(255)
);
CREATE TABLE flight(
    FlightNo varchar(255) PRIMARY KEY,
    Type varchar(255),
    Origin varchar(255),
    Destination varchar(255),
    DepartureTime varchar(255),
    ArrivalTime varchar(255)
);
CREATE TABLE Passenger(
    PassengerID varchar(255) PRIMARY KEY,
    Name varchar(255),
    Gender varchar(255),
    DOB date,
    MobileNo varchar(255),
    EnamilID varchar(255)
);
CREATE TABLE Terminal(
    TerminalID varchar(255) PRIMARY KEY,
    TerminalName varchar(255),
    AirCode varchar(255),
    FOREIGN KEY(AirCode) REFERENCES Airport(AirCode)
);
CREATE TABLE ticket(
    TickNo varchar(255) PRIMARY KEY,
    PassengerID varchar(255),
    FlightID varchar(255),
    Type varchar(255),
    Terminal varchar(255),
    FOREIGN KEY(PassengerID) REFERENCES Passenger(PassengerID),
    FOREIGN KEY(FlightID) REFERENCES flight(FlightNo),
    FOREIGN KEY(Terminal) REFERENCES Terminal(TerminalID)
);