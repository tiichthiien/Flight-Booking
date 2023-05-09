CREATE DATABASE Flight_Reservation;
use Flight_Reservation;

CREATE TABLE users(
	username varchar(255),
    email varchar(255),
    password varchar(255)
);
CREATE TABLE Airport (
    AirCode VARCHAR(255),
    Name VARCHAR(255),
    City VARCHAR(255),
    State VARCHAR(255)
);
CREATE TABLE flight(
    FlightNo varchar(255),
    Type varchar(255),
    Origin varchar(255),
    Destination varchar(255),
    DepartureTime varchar(255),
    ArrivalTime varchar(255)
);
CREATE TABLE Passenger(
    PassengerID varchar(255),
    Name varchar(255),
    Gender varchar(255),
    DOB date,
    MobileNo varchar(255),
    EnamilID varchar(255)
);
CREATE TABLE Terminal(
    TerminalID varchar(255),
    TerminalName varchar(255),
    AirCode varchar(255)
);
CREATE TABLE ticket(
    TickNo varchar(255),
    PassengerID varchar(255),
    FlightID varchar(255),
    Type varchar(255),
    Terminal varchar(255)
);