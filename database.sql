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

INSERT INTO users (username, email, password)
VALUES ('johnsmith', 'johnsmith@example.com', 'password123');

INSERT INTO Airport (AirCode, Name, City, State)
VALUES ('JFK', 'John F. Kennedy International Airport', 'New York City', 'New York');

INSERT INTO flight (FlightNo, Type, Origin, Destination, DepartureTime, ArrivalTime)
VALUES ('DL123', 'Domestic', 'JFK', 'LAX', '2023-06-15 12:00:00', '2023-06-15 15:00:00');

INSERT INTO Passenger (PassengerID, Name, Gender, DOB, MobileNo, EnamilID)
VALUES ('P123', 'Jane Doe', 'Female', '1990-01-01', '555-555-1234', 'janedoe@example.com');

INSERT INTO Terminal (TerminalID, TerminalName, AirCode)
VALUES ('T1', 'Terminal 1', 'JFK');

INSERT INTO ticket (TickNo, PassengerID, FlightID, Type, Terminal)
VALUES ('T123', 'P123', 'DL123', 'Economy', 'T1');