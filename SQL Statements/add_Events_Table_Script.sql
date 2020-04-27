CREATE TABLE "bearsbaseball"."events" 
( "EventNumber" INT NOT NULL 
, "AnnouncementNumber" INT NULL DEFAULT NULL 
, "Email" TEXT NULL DEFAULT NULL 
, "SessionID" VARCHAR(9) NULL DEFAULT NULL 
, "SeasonName" TEXT NULL DEFAULT NULL 
, "GameNumber" INT NULL DEFAULT NULL 
, "Type" TEXT NULL DEFAULT NULL 
, "Date" DATE NOT NULL 
, "Time" TIME NOT NULL 
, "Location" TEXT NOT NULL 
, "Opponent" TEXT NULL DEFAULT NULL 
, "Score" TEXT NULL DEFAULT NULL 
, "Outcome" TEXT NULL DEFAULT NULL 
, PRIMARY KEY ("EventNumber")) ENGINE = InnoDB; 