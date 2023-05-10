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

INSERT INTO flight VALUES
('VN001', 'Domestic', 'Hanoi', 'Ho Chi Minh City', '09:00', '11:30'),
('VN002', 'Domestic', 'Ho Chi Minh City', 'Hanoi', '14:00', '16:30'),
('VN003', 'Domestic', 'Da Nang', 'Nha Trang', '10:45', '12:15'),
('VN004', 'Domestic', 'Nha Trang', 'Da Nang', '13:30', '15:00'),
('VN005', 'Domestic', 'Phu Quoc', 'Can Tho', '11:00', '11:45'),
('VN006', 'Domestic', 'Can Tho', 'Phu Quoc', '12:30', '13:15'),
('VN007', 'Domestic', 'Hue', 'Hai Phong', '08:15', '10:00'),
('VN008', 'Domestic', 'Hai Phong', 'Hue', '11:30', '13:15'),
('VN009', 'Domestic', 'Vinh', 'Ha Tinh', '12:00', '12:45'),
('VN010', 'Domestic', 'Ha Tinh', 'Vinh', '13:30', '14:15'),
('VN011', 'Domestic', 'Quy Nhon', 'Dong Hoi', '14:00', '15:30'),
('VN012', 'Domestic', 'Dong Hoi', 'Quy Nhon', '16:00', '17:30'),
('VN013', 'Domestic', 'Hanoi', 'Da Nang', '08:30', '10:00'),
('VN014', 'Domestic', 'Da Nang', 'Hanoi', '11:00', '12:30'),
('VN015', 'Domestic', 'Ho Chi Minh City', 'Nha Trang', '15:15', '16:45'),
('VN016', 'Domestic', 'Nha Trang', 'Ho Chi Minh City', '17:00', '18:30'),
('VN017', 'Domestic', 'Phu Quoc', 'Can Tho', '10:00', '10:45'),
('VN018', 'Domestic', 'Can Tho', 'Phu Quoc', '11:30', '12:15'),
('VN019', 'Domestic', 'Hue', 'Hai Phong', '07:45', '09:30'),
('VN020', 'Domestic', 'Hai Phong', 'Hue', '10:30', '12:15');


INSERT INTO Passenger (PassengerID, Name, Gender, DOB, MobileNo, EnamilID)
VALUES ('P123', 'Jane Doe', 'Female', '1990-01-01', '555-555-1234', 'janedoe@example.com');

INSERT INTO Terminal (TerminalID, TerminalName, AirCode)
VALUES ('T1', 'Terminal 1', 'JFK');

INSERT INTO ticket (TickNo, PassengerID, FlightID, Type, Terminal)
VALUES ('T123', 'P123', 'VN001', 'Economy', 'T1');