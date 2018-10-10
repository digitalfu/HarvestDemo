Feature: Harvest Info
  In order to manage harvest
  As a user
  I want to get harvest information

  Scenario: Getting days till projected harvest (across months)
    Given today is '2018-10-10'
    And a projected harvest of '2018-11-10'
    When a scenario sends a harvest request
    Then days till harvest should be 31

  Scenario: Getting days till projected harvest (across years)
    Given today is '2018-10-10'
    And a projected harvest of '2019-11-10'
    When a scenario sends a harvest request
    Then days till harvest should be 396