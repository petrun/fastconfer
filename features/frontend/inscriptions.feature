@inscription @sprint4

Feature: fill form
  In order to send my article
  As a researcher
  I want to be able to fill form

  Background:
    Given there are following users:
      | username    | email             | plainPassword | enabled  |
      | user1       | user1@uco.es      | secret1       | 1        |
      | user3       | c@uco.es          | secret3       | 1        |
    And I am authenticated as "user1" with "secret1"
    And there are following topics:
      | name    |
      | topicA  |
      | topicB  |
      | topicC  |
      | topicD  |
    And there are following conferences:
      | name                   | city    | description                               | code  | url       |dateStart  | dateEnd    | topics |deadTime   |dateNews   |chairmans|
      | I Example Conference   | London2 | Description of the II Example Conference  | code2 | www.b.com |now -3 days| now +3 days| topicB |now +3 days|now +3 days|user3    |
    And there are following inscriptions:
      |username| name                 |
      |user1   | I Example Conference |
    And there are following articles:
      |title  | keyword  | abstract             |  stateEnd |
      |first  | example1 | 1tex example abstract|  sent     |

    Scenario: go page of new article
      Given I am on the conference page for "I Example Conference"
      Then I should see "Send article"
      When I follow "Send article"
      Then I should be on new article page for "I Example Conference"
      Then I should see "New submission"

    Scenario: send empty form
      Given I am on the new article page for "I Example Conference"
      Then I should see "Submit"
      When I press "Submit"
      Then I should see "This value should not be blank."

    Scenario: send form too short Abstract
      Given I am on the new article page for "I Example Conference"
      When I fill in the following:
        |Title   |first   |
        |Abstract|1tex |
        |Keyword |example1|
      And I attach the file "Perrito.jpg" to "article_path"
      When I press "Submit"
      Then I should see "too short"

    Scenario: send form
       Given I am on the new article page for "I Example Conference"
       When I fill in the following:
       |Title   |first   |
       |Abstract|1tex example abstract|
       |Keyword |example1|
       And I attach the file "Perrito.jpg" to "article_path"
       When I press "Submit"
       Then I should be on list article page for "I Example Conference"
       And I should see "Your article has been successfully uploaded"


