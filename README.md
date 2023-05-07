# Bank API

Refer to the [Getting Started Guide](https://api-platform.com/docs/distribution) for more information.

Get bank
```
{
  bank(id: "/banks/1") {
    legalName
    address
    accounts {
      totalCount
      edges {
        node {
          identifier
          person {
            givenName
            familyName
          }
        }
      }
    }
  }
}
```

Get person:
```
{
  person(id: "/people/1") {
    givenName
    accounts {
      edges {
        node {
          identifier
          bank {
            legalName
          }
        }
      }
    }
  }
}
```
Bank clients
```
{
  people {
    collection {
      givenName
      familyName
      accounts {
        edges {
          node {
            identifier
            amount {
              value
              currency
            }
          }
        }
      }
    }
  }
}
```
All accounts
```
{
  accounts {
    collection {
      id
      identifier
      person {
        givenName
        familyName
      }
      bank {
        address
        legalName
      }
    }
  }
}
```