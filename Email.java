//
// Source code recreated from a .class file by

package org.example.server;

import javax.activation.DataHandler;
import javax.activation.DataSource;
import javax.activation.FileDataSource;
import javax.mail.*;
import javax.mail.internet.InternetAddress;
import javax.mail.internet.MimeBodyPart;
import javax.mail.internet.MimeMessage;
import javax.mail.internet.MimeMultipart;
import java.io.File;
import java.util.Properties;

public class Email {
    String host = "smtp.gmail.com";
    String username = "eelection3.portal@gmail.com";
    String from = "eelection3.portal@gmail.com";
    String password = "mngv mtyl wmzk exmi";
    Session session;

    public Email() {
        Properties properties = System.getProperties();
        properties.put("mail.smtp.host", host);
        properties.put("mail.smtp.port", "465");
        properties.put("mail.smtp.ssl.enable", "true");
        properties.put("mail.smtp.auth", "true");
        String username = this.username;
        String password = this.password;
        this.session = Session.getInstance(properties, new javax.mail.Authenticator() {
            protected PasswordAuthentication getPasswordAuthentication() {

                return new PasswordAuthentication(username, password);

            }

        });
        this.session.setDebug(true);
    }

    public void sendParticipantRegistrationRequestEmail(String to, String participantEmail, String username) throws MessagingException {
        MimeMessage message = new MimeMessage(this.session);

        message.setFrom(new InternetAddress(this.from));

        message.addRecipient(Message.RecipientType.TO, new InternetAddress(to));

        message.setSubject("Notification of registration under your school");

        StringBuilder emailMessage = new StringBuilder();
        emailMessage.append("New participant notification\n\n");
        emailMessage.append("This message is to notify you of a new participant's request to register under your school\n\n");
        emailMessage.append("The participant details are as below\n");
        emailMessage.append("\tUsername: ").append(username).append("\n");
        emailMessage.append("\temail: ").append(participantEmail).append("\n");
        emailMessage.append("\nTo verify this participant please login into the command line and confirm with the commands\n");
        emailMessage.append("\tconfirm with:-> confirm yes/no " + username + "\n");

        message.setText(emailMessage.toString());

        Transport.send(message);

    }

    public void sendRejectedParticipantEmail(String to, String username) throws MessagingException {
        MimeMessage message = new MimeMessage(this.session);

        // Set sender and recipient addresses
        message.setFrom(new InternetAddress(this.from));
        message.addRecipient(Message.RecipientType.TO, new InternetAddress(to));

        // Set email subject
        message.setSubject("Notification about your rejection");

        // Construct email message body
        StringBuilder emailMessage = new StringBuilder();
        emailMessage.append("Rejected participant notification\n\n");
        emailMessage.append("This message is to notify you that you have been denied from taking part in the math challenge \n\n");
        emailMessage.append("Contact your school representative for more information about your rejection\n");
        emailMessage.append(" we are sorry, try again next time:\n");


        // Set email message text
        message.setText(emailMessage.toString());

        // Send the email message
        Transport.send(message);
      }

    public void sendConfirmedParticipantEmail(String to, String username) throws MessagingException {
        // Create new MimeMessage for sending email
        MimeMessage message = new MimeMessage(this.session);

        // Set sender and recipient addresses
        message.setFrom(new InternetAddress(this.from));
        message.addRecipient(Message.RecipientType.TO, new InternetAddress(to));

        // Set email subject
        message.setSubject("Notification for confirmation");

        // Construct email message body
        StringBuilder emailMessage = new StringBuilder();
        emailMessage.append("confirmation notification\n\n");
        emailMessage.append("This message is to notify you that you have been confirmed to take part in the math challenge \n\n");
        emailMessage.append("Their details are as follows:\n");
        emailMessage.append(" please login into the command line interface to attempt the challenges:\n");

        // Set email message text
        message.setText(emailMessage.toString());

        // Send the email message
        Transport.send(message);
          }
}