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

# good publishers
INSERT INTO publishers (company_name, phone_number, email, address) VALUES ('Hachette Book Group', '800-759-0190', 'hbg@support.com', '1290 6th Ave, New York, NY 10019, USA');
INSERT INTO publishers (company_name, phone_number, email, address) VALUES ('McGill-Queen''s University Press', '(514) 398-3750', 'mqup@mcgill.ca', '1010 Sherbrooke West Suite 1720 Montreal, Quebec H3A 2R7 Canada');
INSERT INTO publishers (company_name, phone_number, email, address) VALUES ('The Crown Publishing Group', '978-750-8400', 'customerservice@prh.com.', '222 Rosewood Drive, Danvers, MA 01923');

INSERT INTO branches (publisher_id, branch_name, branch_manager, phone_number, email, address) VALUES (1, 'Grand Central Publishing', 'Sherrilyn Kenyon', '+1 212-364-1100', null, '1390 6th Ave, New York, NY 10104, USA');
INSERT INTO branches (publisher_id, branch_name, branch_manager, phone_number, email, address) VALUES (1, 'Little, Brown and Company', 'Pete Hamill', '+1 617-227-0730', null, '53 State St, Boston, MA 02109, USA');
INSERT INTO branches (publisher_id, branch_name, branch_manager, phone_number, email, address) VALUES (1, 'Hachette Canada Inc', 'Gail Carriger', '(514) 382-3034', null, '9001 Boulevard de l''Acadie, Montréal, QC H4N 3H5');
INSERT INTO branches (publisher_id, branch_name, branch_manager, phone_number, email, address) VALUES (2, 'McGill-Queen''s University Press Kingston', 'Dale Carnegie', '(613) 533-2610', 'mqup@queensu.ca', 'McGill-Queen''s University Press Douglas Library Building 93 University Avenue Kingston, ON K7L 5C4 Canada');
INSERT INTO branches (publisher_id, branch_name, branch_manager, phone_number, email, address) VALUES (2, 'UK Office MQUP', 'Richard Baggaley', '(+44) 1295 720025', 'richard.baggaley.mqup@mcgill.ca', null);

# good books
insert into books (book_id, isbn, title, edition, price, publisher_id, category) values (1, '825211850-X', '21 tapaa pilata avioliitto', '6', 11.98, 2, '0');
insert into books (book_id, isbn, title, edition, price, publisher_id, category) values (2, '207229379-0', 'Out-of-Towners, The', '8', 12.29, 6, '0');
insert into books (book_id, isbn, title, edition, price, publisher_id, category) values (3, '767745835-1', 'Infernal Affairs (Mou gaan dou)', '6', 22.45, 3, '3');
insert into books (book_id, isbn, title, edition, price, publisher_id, category) values (4, '102105236-1', 'Washington Heights', '9', 30.67, 3, '2');
insert into books (book_id, isbn, title, edition, price, publisher_id, category) values (5, '853487402-6', 'Dirty Money (Un flic)', '2', 20.47, 1, '4');
insert into books (book_id, isbn, title, edition, price, publisher_id, category) values (6, '047443413-3', 'M. Hulot’s Holiday (Mr. Hulot''s Holiday) (Vacances de Monsieur Hulot, Les)', '9', 169.88, 2, '0');
insert into books (book_id, isbn, title, edition, price, publisher_id, category) values (7, '255549224-0', 'Original Sin', '7', 59.61, 1, '0');
insert into books (book_id, isbn, title, edition, price, publisher_id, category) values (8, '092091632-5', 'Dreamboat', '7', 36.55, 1, '5');
insert into books (book_id, isbn, title, edition, price, publisher_id, category) values (9, '590749912-5', 'Journey to the Far Side of the Sun (a.k.a. Doppelgänger)', '9', 51.13, 3, '0');
insert into books (book_id, isbn, title, edition, price, publisher_id, category) values (10, '144391520-3', 'Made in Heaven', '3', 98.56, 2, '5');

# e.g. book with book id 1 is written by author with author id 1 and 2
INSERT INTO books_authors (book_authors_id, book_id, author_id) VALUES (1, 1, 1);
INSERT INTO books_authors (book_authors_id, book_id, author_id) VALUES (2, 2, 12);
INSERT INTO books_authors (book_authors_id, book_id, author_id) VALUES (3, 3, 13);
INSERT INTO books_authors (book_authors_id, book_id, author_id) VALUES (4, 4, 12);
INSERT INTO books_authors (book_authors_id, book_id, author_id) VALUES (5, 5, 1);
INSERT INTO books_authors (book_authors_id, book_id, author_id) VALUES (6, 6, 2);
INSERT INTO books_authors (book_authors_id, book_id, author_id) VALUES (7, 7, 3);
INSERT INTO books_authors (book_authors_id, book_id, author_id) VALUES (8, 8, 3);
INSERT INTO books_authors (book_authors_id, book_id, author_id) VALUES (9, 9, 8);
INSERT INTO books_authors (book_authors_id, book_id, author_id) VALUES (10, 10, 12);
INSERT INTO books_authors (book_authors_id, book_id, author_id) VALUES (11, 1, 2);

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
