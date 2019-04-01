SET FOREIGN_KEY_CHECKS = 0;
TRUNCATE TABLE `authors`;
TRUNCATE TABLE `employees`;
TRUNCATE TABLE `customers`;
TRUNCATE TABLE `orders`;
TRUNCATE TABLE `publishers`;
TRUNCATE TABLE `books`;
TRUNCATE TABLE `book_authors`;
TRUNCATE TABLE `books_inventory`;
TRUNCATE TABLE `order_items`;
TRUNCATE TABLE `branches`;
TRUNCATE TABLE `shipments`;

SET FOREIGN_KEY_CHECKS = 0;
INSERT INTO authors (first_name, middle_name, last_name, bio) VALUES ('Walter', null, 'Isaacson', 'Journalist and historian Walter Isaacson is best known in literary circles as the writer of magisterial biographies, scholarly and meticulously researched, yet immensely entertaining.');
INSERT INTO authors (first_name, middle_name, last_name, bio) VALUES ('J.R.R.', null, 'Tolkein', 'J.R.R. Tolkien (b. January 3rd, 1892 in Bloemfontain, South Africa--d. September 2nd, 1973) was an English author and poet most famous for the Lord of the Rings trilogy. He is also the author of The Hobbit and a literary criticism of Beowulf entitled Beowulf: The Monsters and the Critics as well as several children''s books. Tolkien had a keen interest in linguistics, which he studied in university, and his passion for language comes through in many of his works, particularly the invented language of Elvish in the Lord of the Rings triology. He was ranked by Forbes as the 5th highest-earning dead celebrity in 2009.');
INSERT INTO authors (first_name, middle_name, last_name, bio) VALUES ('Stephen', null, 'King', 'Stephen King (b. September 21, 1947) is the bestselling American author of 50 horror, suspsense, and science fiction/fantasy novels. He has also written nearly two hundred short stories and published a series of comics called The Gunslinger Born, based on his The Dark Tower series. King has won numerous awards throughout his career, including the World Fantasy Award for Life Achievement and the Canadian Booksellers Association Lifetime Achievement Award.');
INSERT INTO authors (first_name, middle_name, last_name, bio) VALUES ('Andrew', null, 'Gross', 'Born in New York City in 1952, Andrew Gross is a best-selling author of thrillers. He has also collaborated with suspense writer James Patterson to produce top sellers. Gross earned a degree in English from Middlebury College and a Master''s degree in business policy from Columbia University. He also attended the Writers Program at the University of Iowa. Prior to fulltime writing, Gross has had a career in the garment industry. He lives in Westchester, New York.');
INSERT INTO authors (first_name, middle_name, last_name, bio) VALUES ('James', null, 'Patterson', 'James Patterson is a prolific author of thrillers, mysteries, young adult novels and more. His first successful series featured psychologist Alex Cross.');
INSERT INTO authors (first_name, middle_name, last_name, bio) VALUES ('Stieg', null, 'Larsson', 'Stieg Larsson, who lived in Sweden, was the editor-in-chief of the magazine Expo and a leading expert on antidemocratic right-wing extremist and Nazi organizations. He died in 2004, shortly after delivering the manuscripts for his Millennium novels, a trilogy of thrillers that became international bestsellers.');
INSERT INTO authors (first_name, middle_name, last_name, bio) VALUES ('Dan', null, 'Brown', 'One of the best-selling authors ever, Daniel "Dan" Brown has sold hundreds of millions of copies of his books. They have been translated into fifty-two languages. Born in 1964 in New Hampshire, Brown graduated from Phillips Exeter Academy and Amherst College. His hugely popular novel, The Da Vinci Code, was adapted into a film starring Tom Hanks and directed by Ron Howard. The same team took on the film adaptation of Angels & Demons. In In 2005, Brown was named one of the "100 Most Influential People in the World" by Time Magazine.');
INSERT INTO authors (first_name, middle_name, last_name, bio) VALUES ('Kate', null, 'Morton', 'Kate Morton, a native Australian, holds degrees in dramatic art and English literature and is currently a doctoral candidate at the University of Queensland. She lives with her family in Brisbane, Australia, and is writing her second novel.');
INSERT INTO authors (first_name, middle_name, last_name, bio) VALUES ('Gillian', null, 'Flynn', 'GILLIAN FLYNN’s debut novel, Sharp Objects, was an Edgar Award finalist and the winner of two of Britain’s Dagger Awards. She lives in Chicago with her husband, Brett Nolan, and a rather giant cat named Roy.');
INSERT INTO authors (first_name, middle_name, last_name, bio) VALUES ('Dave', null, 'Cullen', 'Dave Cullen has been covering the blight of mass murders in America for two decades, first with COLUMBINE, now PARKLAND: Birth of a Movement. COLUMBINE was a New York Times bestseller and the consensus definitive account. PARKLAND is a story of hope: the genesis of the extraordinary March for Our Lives movement.');
INSERT INTO authors (first_name, middle_name, last_name, bio) VALUES ('Paulo', null, 'Coelho', 'Brazilian author Paulo Coelho broke sacred ground -- and crossed over into worldwide fame as an author -- with his symbolic masterpiece, The Alchemist. Since then, Coelho has dedicated his work to the ideal of helping people to follow their wildest dreams.');
INSERT INTO authors (first_name, middle_name, last_name, bio) VALUES ('Scott', 'F.', 'Fitzgerald', 'Inseparably associated with a point in history he claimed to despise, F. Scott Fitzgerald is both the quintessential Jazz-Age writer and perhaps the era s harshest critic. However, the complexity and sheer timelessness of classics such as The Great Gatsby has ensured that Fitzgerald s work will never be regarded as mere period pieces.');
INSERT INTO authors (first_name, middle_name, last_name, bio) VALUES ('Ron', null, 'Chernow', 'New York Times bestselling author Ron Chernow has gained recent attention for Alexander Hamilton, the inspiration for the hit Broadway musical Hamilton. His more recent biography of a Founding Father, Washington: A Life, won a Pulitzer Prize for Biography. In addition to writing award-winning books, he’s a freelance journalist and has advised on TV documentaries.');
INSERT INTO authors (first_name, middle_name, last_name, bio) VALUES ('Edmund', null, 'Morris', 'From his prizewinning biographies of his favorite president -- The Rise of Theodore Roosevelt and, more recently, Theodore Rex -- to his controversial coverage of Ronald Reagan in Dutch, Edmund Morris has established a reputation as a presidential profiler to watch.');
SET FOREIGN_KEY_CHECKS = 1;

SET FOREIGN_KEY_CHECKS = 0;
# good publishers
INSERT INTO publishers (company_name, phone_number, email, password, address) VALUES ('Hachette Book Group', '800-759-0190', 'hbg@support.com', '5wtFjM3olg', '1290 6th Ave, New York, NY 10019, USA');
INSERT INTO publishers (company_name, phone_number, email, password, address) VALUES ('McGill-Queen''s University Press', '(514) 398-3750', 'mqup@mcgill.ca', 'wIVpVIJ', '1010 Sherbrooke West Suite 1720 Montreal, Quebec H3A 2R7 Canada');
INSERT INTO publishers (company_name, phone_number, email, password, address) VALUES ('The Crown Publishing Group', '978-750-8400', 'customerservice@prh.com', 'hqWGiwIqvGv', '222 Rosewood Drive, Danvers, MA 01923');
insert into publishers (company_name, phone_number, email, password, address) values ('Rogahn, Stiedemann and Gulgowski', '365-245-1875', 'ctwiddle0@senate.gov', 'sYHdAB1tw9', '53 Riverside Plaza, Montreal, QC');
insert into publishers (company_name, phone_number, email, password, address) values ('Herzog LLC', '630-633-6512', 'fstockton1@altervista.org', 'YQZIc7KFbsfP', '026 Dapin Center, Montreal, QC');
SET FOREIGN_KEY_CHECKS = 1;

SET FOREIGN_KEY_CHECKS = 0;
INSERT INTO branches (publisher_id, branch_name, branch_manager, phone_number, email, address) VALUES (1, 'Grand Central Publishing', 'Sherrilyn Kenyon', '+1 212-364-1100', 'ndaniel0@ocn.ne.jp', '1390 6th Ave, New York, NY 10104, USA');
INSERT INTO branches (publisher_id, branch_name, branch_manager, phone_number, email, address) VALUES (1, 'Little, Brown and Company', 'Pete Hamill', '+1 617-227-0730', 'lgouny1@vk.com', '53 State St, Boston, MA 02109, USA');
INSERT INTO branches (publisher_id, branch_name, branch_manager, phone_number, email, address) VALUES (1, 'Hachette Canada Inc', 'Gail Carriger', '(514) 382-3034', 'ehubber2@berkeley.edu', '9001 Boulevard de l''Acadie, Montréal, QC H4N 3H5');
INSERT INTO branches (publisher_id, branch_name, branch_manager, phone_number, email, address) VALUES (2, 'McGill-Queen''s University Press Kingston', 'Dale Carnegie', '(613) 533-2610', 'mqup@queensu.ca', 'McGill-Queen''s University Press Douglas Library Building 93 University Avenue Kingston, ON K7L 5C4 Canada');
INSERT INTO branches (publisher_id, branch_name, branch_manager, phone_number, email, address) VALUES (2, 'UK Office MQUP', 'Richard Baggaley', '(+44) 1295 720025', 'richard.baggaley.mqup@mcgill.ca', null);
SET FOREIGN_KEY_CHECKS = 1;

SET FOREIGN_KEY_CHECKS = 0;
# good books
INSERT INTO books (book_id, isbn, title, edition, price, publisher_id, category) VALUES (1, '825211850-X', '21 tapaa pilata avioliitto', 6, 11.98, 2, '0');
INSERT INTO books (book_id, isbn, title, edition, price, publisher_id, category) VALUES (2, '207229379-0', 'Out-of-Towners, The', 8, 12.29, 5, '0');
INSERT INTO books (book_id, isbn, title, edition, price, publisher_id, category) VALUES (3, '767745835-1', 'Infernal Affairs (Mou gaan dou)', 6, 22.45, 3, '3');
INSERT INTO books (book_id, isbn, title, edition, price, publisher_id, category) VALUES (4, '102105236-1', 'Washington Heights', 9, 30.67, 3, '2');
INSERT INTO books (book_id, isbn, title, edition, price, publisher_id, category) VALUES (5, '853487402-6', 'Dirty Money (Un flic)', 2, 20.47, 1, '4');
INSERT INTO books (book_id, isbn, title, edition, price, publisher_id, category) VALUES (6, '047443413-3', 'M. Hulot’s Holiday (Mr. Hulot''s Holiday) (Vacances de Monsieur Hulot, Les)', 9, 169.88, 2, '0');
INSERT INTO books (book_id, isbn, title, edition, price, publisher_id, category) VALUES (7, '255549224-0', 'Original Sin', 7, 59.61, 1, '0');
INSERT INTO books (book_id, isbn, title, edition, price, publisher_id, category) VALUES (8, '092091632-5', 'Dreamboat', 7, 36.55, 1, '5');
INSERT INTO books (book_id, isbn, title, edition, price, publisher_id, category) VALUES (9, '590749912-5', 'Journey to the Far Side of the Sun (a.k.a. Doppelgänger)', 9, 51.13, 3, '0');
INSERT INTO books (book_id, isbn, title, edition, price, publisher_id, category) VALUES (10, '144391520-3', 'Made in Heaven', 3, 98.56, 2, '5');
insert into books (book_id, isbn, title, edition, price, publisher_id, category) values (11, '049325683-0', 'Macario', 10, 30.1, 5, '2');
insert into books (book_id, isbn, title, edition, price, publisher_id, category) values (12, '975551791-X', 'Chhoti Si Baat', 8, 18.8, 4, '5');
insert into books (book_id, isbn, title, edition, price, publisher_id, category) values (13, '202698906-0', 'Narrien illat ', 4, 46.38, 4, '1');
insert into books (book_id, isbn, title, edition, price, publisher_id, category) values (14, '095978923-5', 'Half Past Dead', 9, 28.28, 5, '1');
insert into books (book_id, isbn, title, edition, price, publisher_id, category) values (15, '395512014-7', 'I Still Know What You Did Last Summer', 2, 73.43, 4, '4');
SET FOREIGN_KEY_CHECKS = 1;

SET FOREIGN_KEY_CHECKS = 0;
# e.g. book with book id 1 is written by author with author id 1 and 2
INSERT INTO book_authors (book_authors_id, book_id, author_id) VALUES (1, 1, 1);
INSERT INTO book_authors (book_authors_id, book_id, author_id) VALUES (2, 2, 12);
INSERT INTO book_authors (book_authors_id, book_id, author_id) VALUES (3, 3, 13);
INSERT INTO book_authors (book_authors_id, book_id, author_id) VALUES (4, 4, 12);
INSERT INTO book_authors (book_authors_id, book_id, author_id) VALUES (5, 5, 1);
INSERT INTO book_authors (book_authors_id, book_id, author_id) VALUES (6, 6, 2);
INSERT INTO book_authors (book_authors_id, book_id, author_id) VALUES (7, 7, 3);
INSERT INTO book_authors (book_authors_id, book_id, author_id) VALUES (8, 8, 3);
INSERT INTO book_authors (book_authors_id, book_id, author_id) VALUES (9, 9, 8);
INSERT INTO book_authors (book_authors_id, book_id, author_id) VALUES (10, 10, 12);
INSERT INTO book_authors (book_authors_id, book_id, author_id) VALUES (11, 12, 7);
INSERT INTO book_authors (book_authors_id, book_id, author_id) VALUES (12, 13, 9);
INSERT INTO book_authors (book_authors_id, book_id, author_id) VALUES (13, 14, 4);
INSERT INTO book_authors (book_authors_id, book_id, author_id) VALUES (14, 14, 5);
INSERT INTO book_authors (book_authors_id, book_id, author_id) VALUES (15, 15, 6);
SET FOREIGN_KEY_CHECKS = 1;

SET FOREIGN_KEY_CHECKS = 0;
# one-to-one relationship with books
# e.g. book with book id 1 has sold 0 copies and 162 left in stock
insert into books_inventory (book_inv_id, book_id, qty_on_hand, qty_sold) values (1, 1, 162, 0);
insert into books_inventory (book_inv_id, book_id, qty_on_hand, qty_sold) values (2, 2, 59, 0);
insert into books_inventory (book_inv_id, book_id, qty_on_hand, qty_sold) values (3, 3, 39, 0);
insert into books_inventory (book_inv_id, book_id, qty_on_hand, qty_sold) values (4, 4, 61, 0);
insert into books_inventory (book_inv_id, book_id, qty_on_hand, qty_sold) values (5, 5, 30, 0);
insert into books_inventory (book_inv_id, book_id, qty_on_hand, qty_sold) values (6, 6, 68, 0);
insert into books_inventory (book_inv_id, book_id, qty_on_hand, qty_sold) values (7, 7, 106, 0);
insert into books_inventory (book_inv_id, book_id, qty_on_hand, qty_sold) values (8, 8, 97, 0);
insert into books_inventory (book_inv_id, book_id, qty_on_hand, qty_sold) values (9, 9, 17, 0);
insert into books_inventory (book_inv_id, book_id, qty_on_hand, qty_sold) values (10, 10, 58, 0);
insert into books_inventory (book_inv_id, book_id, qty_on_hand, qty_sold) values (11, 11, 12, 0);
insert into books_inventory (book_inv_id, book_id, qty_on_hand, qty_sold) values (12, 12, 31, 0);
insert into books_inventory (book_inv_id, book_id, qty_on_hand, qty_sold) values (13, 13, 28, 0);
insert into books_inventory (book_inv_id, book_id, qty_on_hand, qty_sold) values (14, 14, 10, 0);
insert into books_inventory (book_inv_id, book_id, qty_on_hand, qty_sold) values (15, 15, 6, 0);
SET FOREIGN_KEY_CHECKS = 1;

SET FOREIGN_KEY_CHECKS = 0;
insert into customers (customer_name, email, password, phone_number, address) values ('Baxie Picken', 'bpicken0@shutterfly.com', 'V0FBCPCVmC', '807-639-6673', '39829 Pawling Pass, Montreal, QC');
insert into customers (customer_name, email, password, phone_number, address) values ('Leonard Gibbett', 'lgibbett1@pbs.org', '6Du82Trz7tr5', '900-915-4896', '0 Kim Parkway, Toronto, ON');
insert into customers (customer_name, email, password, phone_number, address) values ('Cedric Speak', 'cspeak2@sun.com', 'bdrGwq53yL', '831-811-0574', '52275 Valley Edge Point, Quebec, QC');
insert into customers (customer_name, email, password, phone_number, address) values ('Hurley Ewdale', 'hewdale3@hao123.com', '5hQbWz', '397-843-0930', '4145 Fuller Lane, Vancouver, BC');
insert into customers (customer_name, email, password, phone_number, address) values ('Lorilyn Eke', 'leke4@abc.net.au', 'ThcQ4Du', '938-669-4623', '87 Forest Dale Trail, Calgary, AB');
insert into customers (customer_name, email, password, phone_number, address) values ('Kenny MacLaig', 'kmaclaig5@free.fr', 'hSUYx5PV', '306-769-4133', '52 Park Meadow Avenue, Montreal, QC');
insert into customers (customer_name, email, password, phone_number, address) values ('Camala Cissell', 'ccissell6@accuweather.com', 'f21CXx7IhV', '836-276-6731', '5029 Oak Court, Laval, QC');
insert into customers (customer_name, email, password, phone_number, address) values ('Sherie Conrart', 'sconrart7@cmu.edu', 'BlUJmFij', '287-423-2914', '64844 Commercial Drive, Toronto, ON');
insert into customers (customer_name, email, password, phone_number, address) values ('Jock Jacklings', 'jjacklings8@paypal.com', 'JgpV2tVI', '504-273-4460', '4 Carey Alley, Hamilton, ON');
insert into customers (customer_name, email, password, phone_number, address) values ( 'Daffi Gierck', 'dgierck9@amazon.co.jp', 'mstyFyucu', '917-864-9355', '3121 Sloan Pass, Kingston, ON');
SET FOREIGN_KEY_CHECKS = 1;

SET FOREIGN_KEY_CHECKS = 0;
INSERT INTO employees (emp_id, emp_name, ssn, phone_number, email, password, address, is_admin) VALUES (1, 'Franz Whitham', '901419755', '543-875-6085', 'fwhitham0@ebay.co.uk', 'wroTWL', '18 Kim Alley, Toronto, ON', 0);
INSERT INTO employees (emp_id, emp_name, ssn, phone_number, email, password, address, is_admin) VALUES (2, 'Guglielma Woodroffe', '847163023', '593-593-7903', 'gwoodroffe1@wisc.edu', 'ArtT10MZf', '22750 Coolidge Park, Kingston, ON', 1);
INSERT INTO employees (emp_id, emp_name, ssn, phone_number, email, password, address, is_admin) VALUES (3, 'Franciska Gilyott', '202272250', '238-401-3427', 'fgilyott2@dell.com', 'vO4Hjd9B5', '762 Spaight Avenue, Montreal, QC', 0);
INSERT INTO employees (emp_id, emp_name, ssn, phone_number, email, password, address, is_admin) VALUES (4, 'Lucio Mardall', '056441193', '176-839-6349', 'lmardall3@gravatar.com', '5qL0QmgjN', '18 Dottie Avenue, Montreal, QC', 1);
INSERT INTO employees (emp_id, emp_name, ssn, phone_number, email, password, address, is_admin) VALUES (5, 'Monika Sprowson', '956838039', '509-422-3192', 'msprowson4@exblog.jp', 'lrfZfobfQT', '7677 Eastwood Pass, Montreal, QC', 1);
INSERT INTO employees (emp_id, emp_name, ssn, phone_number, email, password, address, is_admin) VALUES (6, 'Annabelle Glossup', '931881837', '125-509-7975', 'aglossup5@psu.edu', 'VtnaHll', '68795 Washington Circle, Red Deer, AB', 1);
INSERT INTO employees (emp_id, emp_name, ssn, phone_number, email, password, address, is_admin) VALUES (7, 'Sallyanne Paske', '706699409', '509-849-2663', 'spaske6@google.com', 'R8nHxSkqV', '79 Marquette Street, Montreal, QC', 1);
INSERT INTO employees (emp_id, emp_name, ssn, phone_number, email, password, address, is_admin) VALUES (8, 'Diandra Bortoluzzi', '128475778', '632-435-1281', 'dbortoluzzi7@omniture.com', 'B3mheW', '8 Kenwood Pass, Quebec City, QC', 0);
INSERT INTO employees (emp_id, emp_name, ssn, phone_number, email, password, address, is_admin) VALUES (9, 'Neale MacNab', '424335084', '468-276-9816', 'nmacnab8@theguardian.com', 'KRrMX7a', '5 Pennsylvania Avenue, Toronto, ON', 0);
INSERT INTO employees (emp_id, emp_name, ssn, phone_number, email, password, address, is_admin) VALUES (10, 'Dru Cockin', '184698694', '591-965-1724', 'dcockin9@mapquest.com', 'HHGHpJkXO8', '4892 Starling Plaza, Montreal, QC', 1);
SET FOREIGN_KEY_CHECKS = 1;

SET FOREIGN_KEY_CHECKS = 0;
INSERT INTO shipments (shipment_id, book_id, publisher_id, qty_to_receive, is_received, date_shipped) VALUES (1, 2, 5, 73, '0', '2018-04-26');
INSERT INTO shipments (shipment_id, book_id, publisher_id, qty_to_receive, is_received, date_shipped) VALUES (2, 6, 2, 84, '0', '2018-06-28');
INSERT INTO shipments (shipment_id, book_id, publisher_id, qty_to_receive, is_received, date_shipped) VALUES (3, 5, 1, 20, '0', '2018-10-05');
INSERT INTO shipments (shipment_id, book_id, publisher_id, qty_to_receive, is_received, date_shipped) VALUES (4, 8, 1, 146, '0', '2018-05-29');
INSERT INTO shipments (shipment_id, book_id, publisher_id, qty_to_receive, is_received, date_shipped) VALUES (5, 10, 2, 31, '0', '2018-07-14');
INSERT INTO shipments (shipment_id, book_id, publisher_id, qty_to_receive, is_received, date_shipped) VALUES (6, 5, 1, 70, '0', '2018-04-29');
INSERT INTO shipments (shipment_id, book_id, publisher_id, qty_to_receive, is_received, date_shipped) VALUES (7, 1, 2, 106, '0', '2019-03-07');
INSERT INTO shipments (shipment_id, book_id, publisher_id, qty_to_receive, is_received, date_shipped) VALUES (8, 3, 3, 42, '0', '2018-08-16');
INSERT INTO shipments (shipment_id, book_id, publisher_id, qty_to_receive, is_received, date_shipped) VALUES (9, 2, 5, 40, '0', '2018-05-05');
INSERT INTO shipments (shipment_id, book_id, publisher_id, qty_to_receive, is_received, date_shipped) VALUES (10, 10, 2, 37, '0', '2018-12-07');
INSERT INTO shipments (shipment_id, book_id, publisher_id, qty_to_receive, is_received, date_shipped) VALUES (11, 10, 2, 194, '0', '2019-02-19');
INSERT INTO shipments (shipment_id, book_id, publisher_id, qty_to_receive, is_received, date_shipped) VALUES (12, 2, 5, 129, '0', '2018-10-15');
INSERT INTO shipments (shipment_id, book_id, publisher_id, qty_to_receive, is_received, date_shipped) VALUES (13, 5, 1, 105, '0', '2018-05-10');
INSERT INTO shipments (shipment_id, book_id, publisher_id, qty_to_receive, is_received, date_shipped) VALUES (14, 2, 5, 11, '0', '2019-02-16');
INSERT INTO shipments (shipment_id, book_id, publisher_id, qty_to_receive, is_received, date_shipped) VALUES (15, 4, 3, 108, '0', '2018-07-05');
INSERT INTO shipments (shipment_id, book_id, publisher_id, qty_to_receive, is_received, date_shipped) VALUES (16, 9, 3, 3, '0', '2018-07-09');
INSERT INTO shipments (shipment_id, book_id, publisher_id, qty_to_receive, is_received, date_shipped) VALUES (17, 7, 1, 59, '0', '2018-05-05');
INSERT INTO shipments (shipment_id, book_id, publisher_id, qty_to_receive, is_received, date_shipped) VALUES (18, 7, 1, 30, '0', '2018-11-23');
INSERT INTO shipments (shipment_id, book_id, publisher_id, qty_to_receive, is_received, date_shipped) VALUES (19, 8, 1, 89, '0', '2018-07-26');
INSERT INTO shipments (shipment_id, book_id, publisher_id, qty_to_receive, is_received, date_shipped) VALUES (20, 7, 1, 103, '0', '2018-04-26');
SET FOREIGN_KEY_CHECKS = 1;

## publishers have their own inventory/count of books
## this is different from qty_on_hand of bookstore
SET FOREIGN_KEY_CHECKS = 0;
INSERT INTO `publisher_books_inventory` (`pb_book_inv_id`, `book_id`, `publisher_id`, `qty_on_hand`, `qty_sold`) VALUES
(1, 5, 1, 121, 0),
(2, 7, 1, 12, 0),
(3, 8, 1, 45, 0),
(4, 16, 1, 13, 0),
(8, 1, 2, 123, 0),
(9, 6, 2, 65, 0),
(10, 10, 2, 76, 0),
(11, 3, 3, 19, 0),
(12, 4, 3, 21, 0),
(13, 9, 3, 17, 0),
(14, 12, 4, 11, 0),
(15, 13, 4, 132, 0),
(16, 15, 4, 60, 0),
(17, 2, 5, 53, 0),
(18, 11, 5, 203, 0),
(19, 14, 5, 103, 0);
SET FOREIGN_KEY_CHECKS = 1;