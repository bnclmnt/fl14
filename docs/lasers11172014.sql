drop table if exists lasers;

create table lasers
( laserID int unsigned not null auto_increment primary key,
type varchar(50),
medium varchar(50),
application varchar(180)
);

insert into lasers values (NULL,"Gas","Carbon dioxide laser","Material processing - cutting, welding, etc., surgery, dental laser, military lasers.");
insert into lasers values (NULL,"Chemical","Hydrogen fluoride laser","Used in research for laser weaponry, operated in continuous wave mode, can have power in the megawatt range.");
insert into lasers values (NULL,"Metal-Vapor","Helium-Cadmium","Printing and typesetting applications, fluorescence excitation examination (i.e. in U.S. paper currency printing), scientific research.");
insert into lasers values (NULL,"Solid-State","Ruby laser","Holography, tattoo removal. The first type of visible light laser invented; May 1960.");
insert into lasers values (NULL,"Semiconductor","Quantum cascade laser","Research,Future applications may include collision-avoidance radar, industrial-process control and medical diagnostics such as breath analyzers.");