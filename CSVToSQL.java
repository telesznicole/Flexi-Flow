import java.io.*;
import java.util.*;

public class CSVToSQL {

    public static void main(String[] args) {
        Scanner scanner = new Scanner(System.in);

        // Get CSV file path
        System.out.print("Enter the path to the CSV file: ");
        String csvFilePath = scanner.nextLine();

        // Get table title
        System.out.print("Enter the title for the database: ");
        String title = scanner.nextLine().trim().replaceAll("\\s+", "_"); // Replace spaces with underscores for valid SQL table names

        // Create SQL file name based on the title
        String sqlFileName = title + "_database_starter";

        // Read CSV and generate SQL
        try {
            generateSQLFile(csvFilePath, title, sqlFileName, scanner);
            System.out.println("SQL file created successfully: " + sqlFileName + ".sql");
        } catch (Exception e) {
            System.err.println("An error occurred: " + e.getMessage());
        }
    }

    private static void generateSQLFile(String csvFilePath, String tableName, String sqlFileName, Scanner scanner) throws IOException {
        // Create reader for the CSV file
        BufferedReader csvReader = new BufferedReader(new FileReader(csvFilePath));

        // Read the first line for column names
        String headerLine = csvReader.readLine();
        if (headerLine == null) {
            throw new IOException("CSV file is empty.");
        }

        // Split the header line to get column names
        String[] columns = headerLine.split(",");

        // Ask the user for the data type of each column
        String[] columnTypes = new String[columns.length];
        System.out.println("Please specify the data type for each column:");
        for (int i = 0; i < columns.length; i++) {
            System.out.print("Data type for column `" + columns[i] + "`: ");
            columnTypes[i] = scanner.nextLine().trim();
        }

        // Create SQL file writer
        FileWriter sqlWriter = new FileWriter(sqlFileName + ".sql");

        // Write the SQL dump header
        sqlWriter.write("-- SQL Dump Generated from CSV\n");
        sqlWriter.write("START TRANSACTION;\n\n");

        // Dynamically create table structure based on CSV columns and user-provided data types
        sqlWriter.write("CREATE TABLE `" + tableName + "` (\n");

        for (int i = 0; i < columns.length; i++) {
            sqlWriter.write("  `" + columns[i] + "` " + columnTypes[i] + " NOT NULL");
            if (i < columns.length - 1) {
                sqlWriter.write(",\n");
            } else {
                sqlWriter.write("\n");
            }
        }

        sqlWriter.write("  , PRIMARY KEY (`id`)\n");
        sqlWriter.write(") ENGINE=InnoDB DEFAULT CHARSET=utf8;\n\n");

        // Read the CSV rows and generate INSERT statements
        String row;
        int maxId = 0; // To track the maximum id from the CSV

        sqlWriter.write("-- Inserting data from CSV\n");
        while ((row = csvReader.readLine()) != null) {
            String[] data = row.split(",");
            sqlWriter.write("INSERT INTO `" + tableName + "` (");

            // Add column names to INSERT
            for (int i = 0; i < columns.length; i++) {
                sqlWriter.write("`" + columns[i] + "`");
                if (i < columns.length - 1) {
                    sqlWriter.write(", ");
                }
            }

            sqlWriter.write(") VALUES (");

            // Add values from CSV to INSERT
            for (int i = 0; i < data.length; i++) {
                sqlWriter.write("'" + data[i] + "'");
                if (i < data.length - 1) {
                    sqlWriter.write(", ");
                }
            }

            // Track the max id
            int currentId = Integer.parseInt(data[0]);
            if (currentId > maxId) {
                maxId = currentId;
            }

            sqlWriter.write(");\n");
        }

        // Set the AUTO_INCREMENT value to maxId + 1 after all data has been inserted
        sqlWriter.write("\n-- Setting AUTO_INCREMENT to continue from max id + 1\n");
        sqlWriter.write("ALTER TABLE `" + tableName + "` MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=" + (maxId + 1) + ";\n");

        // Add transaction commit and end
        sqlWriter.write("\nCOMMIT;\n");

        // Close resources
        csvReader.close();
        sqlWriter.close();
    }
}
