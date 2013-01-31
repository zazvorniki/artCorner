// LiveValidation 1.3 (standalone version)
// Copyright (c) 2007-2008 Alec Hill (www.livevalidation.com)
// LiveValidation is licensed under the terms of the MIT License

/*********************************************** LiveValidation class ***********************************/

var LiveValidation = function (e, t) {
    this.initialize(e, t)
};
LiveValidation.VERSION = "1.3 standalone";
LiveValidation.TEXTAREA = 1;
LiveValidation.TEXT = 2;
LiveValidation.PASSWORD = 3;
LiveValidation.CHECKBOX = 4;
LiveValidation.SELECT = 5;
LiveValidation.FILE = 6;
LiveValidation.massValidate = function (e) {
    var t = true;
    for (var n = 0, r = e.length; n < r; ++n) {
        var i = e[n].validate();
        if (t) t = i
    }
    return t
};
LiveValidation.prototype = {
    validClass: "LV_valid",
    invalidClass: "LV_invalid",
    messageClass: "LV_validation_message",
    validFieldClass: "LV_valid_field",
    invalidFieldClass: "LV_invalid_field",
    initialize: function (e, t) {
        var n = this;
        if (!e) throw new Error("LiveValidation::initialize - No element reference or element id has been provided!");
        this.element = e.nodeName ? e : document.getElementById(e);
        if (!this.element) throw new Error("LiveValidation::initialize - No element with reference or id of '" + e + "' exists!");
        this.validations = [];
        this.elementType = this.getElementType();
        this.form = this.element.form;
        var r = t || {};
        this.validMessage = r.validMessage || "";
        var i = r.insertAfterWhatNode || this.element;
        this.insertAfterWhatNode = i.nodeType ? i : document.getElementById(i);
        this.onValid = r.onValid || function () {
            this.insertMessage(this.createMessageSpan());
            this.addFieldClass()
        };
        this.onInvalid = r.onInvalid || function () {
            this.insertMessage(this.createMessageSpan());
            this.addFieldClass()
        };
        this.onlyOnBlur = r.onlyOnBlur || false;
        this.wait = r.wait || 0;
        this.onlyOnSubmit = r.onlyOnSubmit || false;
        if (this.form) {
            this.formObj = LiveValidationForm.getInstance(this.form);
            this.formObj.addField(this)
        }
        this.oldOnFocus = this.element.onfocus || function () {};
        this.oldOnBlur = this.element.onblur || function () {};
        this.oldOnClick = this.element.onclick || function () {};
        this.oldOnChange = this.element.onchange || function () {};
        this.oldOnFoucusOut = this.element.OnFoucusOut || function () {};
        this.element.onfocus = function (e) {
            n.doOnFocus(e);
            return n.oldOnFocus.call(this, e)
        };
        if (!this.onlyOnSubmit) {
            switch (this.elementType) {
                case LiveValidation.CHECKBOX:
                    this.element.onclick = function (e) {
                        n.validate();
                        return n.oldOnClick.call(this, e)
                    };
                case LiveValidation.SELECT:
                case LiveValidation.FILE:
                    this.element.onchange = function (e) {
                        n.validate();
                        return n.oldOnChange.call(this, e)
                    };
                    break;
                default:
                    if (!this.onlyOnBlur) this.element.OnFoucusOut = function (e) {
                        n.deferValidation();
                        return n.oldOnFoucusOut.call(this, e)
                    };
                    this.element.onblur = function (e) {
                        n.doOnBlur(e);
                        return n.oldOnBlur.call(this, e)
                    }
            }
        }
    },
    destroy: function () {
        if (this.formObj) {
            this.formObj.removeField(this);
            this.formObj.destroy()
        }
        this.element.onfocus = this.oldOnFocus;
        if (!this.onlyOnSubmit) {
            switch (this.elementType) {
                case LiveValidation.CHECKBOX:
                    this.element.onclick = this.oldOnClick;
                case LiveValidation.SELECT:
                case LiveValidation.FILE:
                    this.element.onchange = this.oldOnChange;
                    break;
                default:
                    if (!this.onlyOnBlur) this.element.OnFoucusOut = this.oldOnFoucusOut;
                    this.element.onblur = this.oldOnBlur
            }
        }
        this.validations = [];
        this.removeMessageAndFieldClass()
    },
    add: function (e, t) {
        this.validations.push({
            type: e,
            params: t || {}
        });
        return this
    },
    remove: function (e, t) {
        var n = false;
        for (var r = 0, i = this.validations.length; r < i; r++) {
            if (this.validations[r].type == e) {
                if (this.validations[r].params == t) {
                    n = true;
                    break
                }
            }
        }
        if (n) this.validations.splice(r, 1);
        return this
    },
    deferValidation: function (e) {
        if (this.wait >= 300) this.removeMessageAndFieldClass();
        var t = this;
        if (this.timeout) clearTimeout(t.timeout);
        this.timeout = setTimeout(function () {
            t.validate()
        }, t.wait)
    },
    doOnBlur: function (e) {
        this.focused = false;
        this.validate(e)
    },
    doOnFocus: function (e) {
        this.focused = true;
        this.removeMessageAndFieldClass()
    },
    getElementType: function () {
        switch (true) {
            case this.element.nodeName.toUpperCase() == "TEXTAREA":
                return LiveValidation.TEXTAREA;
            case this.element.nodeName.toUpperCase() == "INPUT" && this.element.type.toUpperCase() == "TEXT":
                return LiveValidation.TEXT;
            case this.element.nodeName.toUpperCase() == "INPUT" && this.element.type.toUpperCase() == "PASSWORD":
                return LiveValidation.PASSWORD;
            case this.element.nodeName.toUpperCase() == "INPUT" && this.element.type.toUpperCase() == "CHECKBOX":
                return LiveValidation.CHECKBOX;
            case this.element.nodeName.toUpperCase() == "INPUT" && this.element.type.toUpperCase() == "FILE":
                return LiveValidation.FILE;
            case this.element.nodeName.toUpperCase() == "SELECT":
                return LiveValidation.SELECT;
            case this.element.nodeName.toUpperCase() == "INPUT":
                throw new Error("LiveValidation::getElementType - Cannot use LiveValidation on an " + this.element.type + " input!");
            default:
                throw new Error("LiveValidation::getElementType - Element must be an input, select, or textarea!")
        }
    },
    doValidations: function () {
        this.validationFailed = false;
        for (var e = 0, t = this.validations.length; e < t; ++e) {
            var n = this.validations[e];
            switch (n.type) {
                case Validate.Presence:
                case Validate.Confirmation:
                case Validate.Acceptance:
                    this.displayMessageWhenEmpty = true;
                    this.validationFailed = !this.validateElement(n.type, n.params);
                    break;
                default:
                    this.validationFailed = !this.validateElement(n.type, n.params);
                    break
            }
            if (this.validationFailed) return false
        }
        this.message = this.validMessage;
        return true
    },
    validateElement: function (e, t) {
        var n = this.elementType == LiveValidation.SELECT ? this.element.options[this.element.selectedIndex].value : this.element.value;
        if (e == Validate.Acceptance) {
            if (this.elementType != LiveValidation.CHECKBOX) throw new Error("LiveValidation::validateElement - Element to validate acceptance must be a checkbox!");
            n = this.element.checked
        }
        var r = true;
        try {
            e(n, t)
        } catch (i) {
            if (i instanceof Validate.Error) {
                if (n !== "" || n === "" && this.displayMessageWhenEmpty) {
                    this.validationFailed = true;
                    this.message = i.message;
                    r = false
                }
            } else {
                throw i
            }
        } finally {
            return r
        }
    },
    validate: function () {
        if (!this.element.disabled) {
            var e = this.doValidations();
            if (e) {
                this.onValid();
                return true
            } else {
                this.onInvalid();
                return false
            }
        } else {
            return true
        }
    },
    enable: function () {
        this.element.disabled = false;
        return this
    },
    disable: function () {
        this.element.disabled = true;
        this.removeMessageAndFieldClass();
        return this
    },
    createMessageSpan: function () {
        var e = document.createElement("span");
        var t = document.createTextNode(this.message);
        e.appendChild(t);
        return e
    },
    insertMessage: function (e) {
        this.removeMessage();
        if (this.displayMessageWhenEmpty && (this.elementType == LiveValidation.CHECKBOX || this.element.value == "") || this.element.value != "") {
            var t = this.validationFailed ? this.invalidClass : this.validClass;
            e.className += " " + this.messageClass + " " + t;
            if (this.insertAfterWhatNode.nextSibling) {
                this.insertAfterWhatNode.parentNode.insertBefore(e, this.insertAfterWhatNode.nextSibling)
            } else {
                this.insertAfterWhatNode.parentNode.appendChild(e)
            }
        }
    },
    addFieldClass: function () {
        this.removeFieldClass();
        if (!this.validationFailed) {
            if (this.displayMessageWhenEmpty || this.element.value != "") {
                if (this.element.className.indexOf(this.validFieldClass) == -1) this.element.className += " " + this.validFieldClass
            }
        } else {
            if (this.element.className.indexOf(this.invalidFieldClass) == -1) this.element.className += " " + this.invalidFieldClass
        }
    },
    removeMessage: function () {
        var e;
        var t = this.insertAfterWhatNode;
        while (t.nextSibling) {
            if (t.nextSibling.nodeType === 1) {
                e = t.nextSibling;
                break
            }
            t = t.nextSibling
        }
        if (e && e.className.indexOf(this.messageClass) != -1) this.insertAfterWhatNode.parentNode.removeChild(e)
    },
    removeFieldClass: function () {
        if (this.element.className.indexOf(this.invalidFieldClass) != -1) this.element.className = this.element.className.split(this.invalidFieldClass).join("");
        if (this.element.className.indexOf(this.validFieldClass) != -1) this.element.className = this.element.className.split(this.validFieldClass).join(" ")
    },
    removeMessageAndFieldClass: function () {
        this.removeMessage();
        this.removeFieldClass()
    }
};
var LiveValidationForm = function (e) {
    this.initialize(e)
};
LiveValidationForm.instances = {};
LiveValidationForm.getInstance = function (e) {
    var t = Math.random() * Math.random();
    if (!e.id) e.id = "formId_" + t.toString().replace(/\./, "") + (new Date).valueOf();
    if (!LiveValidationForm.instances[e.id]) LiveValidationForm.instances[e.id] = new LiveValidationForm(e);
    return LiveValidationForm.instances[e.id]
};
LiveValidationForm.prototype = {
    initialize: function (e) {
        this.name = e.id;
        this.element = e;
        this.fields = [];
        this.oldOnSubmit = this.element.onsubmit || function () {};
        var t = this;
        this.element.onsubmit = function (e) {
            return LiveValidation.massValidate(t.fields) ? t.oldOnSubmit.call(this, e || window.event) !== false : false
        }
    },
    addField: function (e) {
        this.fields.push(e)
    },
    removeField: function (e) {
        var t = [];
        for (var n = 0, r = this.fields.length; n < r; n++) {
            if (this.fields[n] !== e) t.push(this.fields[n])
        }
        this.fields = t
    },
    destroy: function (e) {
        if (this.fields.length != 0 && !e) return false;
        this.element.onsubmit = this.oldOnSubmit;
        LiveValidationForm.instances[this.name] = null;
        return true
    }
};
var Validate = {
    Presence: function (e, t) {
        var t = t || {};
        var n = t.failureMessage || "Can't be empty!";
        if (e === "" || e === null || e === undefined) {
            Validate.fail(n)
        }
        return true
    },
    Numericality: function (e, t) {
        var n = e;
        var e = Number(e);
        var t = t || {};
        var r = t.minimum || t.minimum == 0 ? t.minimum : null;
        var i = t.maximum || t.maximum == 0 ? t.maximum : null;
        var s = t.is || t.is == 0 ? t.is : null;
        var o = t.notANumberMessage || "Must be a number!";
        var u = t.notAnIntegerMessage || "Must be an integer!";
        var a = t.wrongNumberMessage || "Must be " + s + "!";
        var f = t.tooLowMessage || "Must be more than " + r + "!";
        var l = t.tooHighMessage || "Must be less than " + i + "!";
        if (!isFinite(e)) Validate.fail(o);
        if (t.onlyInteger && (/\.0+$|\.$/.test(String(n)) || e != parseInt(e))) Validate.fail(u);
        switch (true) {
            case s !== null:
                if (e != Number(s)) Validate.fail(a);
                break;
            case r !== null && i !== null:
                Validate.Numericality(e, {
                    tooLowMessage: f,
                    minimum: r
                });
                Validate.Numericality(e, {
                    tooHighMessage: l,
                    maximum: i
                });
                break;
            case r !== null:
                if (e < Number(r)) Validate.fail(f);
                break;
            case i !== null:
                if (e > Number(i)) Validate.fail(l);
                break
        }
        return true
    },
    Format: function (e, t) {
        var e = String(e);
        var t = t || {};
        var n = t.failureMessage || "Website must include http://";
        var r = t.pattern || /./;
        var i = t.negate || false;
        if (!i && !r.test(e)) Validate.fail(n);
        if (i && r.test(e)) Validate.fail(n);
        return true
    },
    Email: function (e, t) {
        var t = t || {};
        var n = t.failureMessage || "Must be a valid email address!";
        Validate.Format(e, {
            failureMessage: n,
            pattern: /^([^@\s]+)@((?:[-a-z0-9]+\.)+[a-z]{2,})$/i
        });
        return true
    },
    Length: function (e, t) {
        var e = String(e);
        var t = t || {};
        var n = t.minimum || t.minimum == 0 ? t.minimum : null;
        var r = t.maximum || t.maximum == 0 ? t.maximum : null;
        var i = t.is || t.is == 0 ? t.is : null;
        var s = t.wrongLengthMessage || "Must be " + i + " characters long!";
        var o = t.tooShortMessage || "Must be more than " + n + " characters long!";
        var u = t.tooLongMessage || "Must be less than " + r + " characters long!";
        switch (true) {
            case i !== null:
                if (e.length != Number(i)) Validate.fail(s);
                break;
            case n !== null && r !== null:
                Validate.Length(e, {
                    tooShortMessage: o,
                    minimum: n
                });
                Validate.Length(e, {
                    tooLongMessage: u,
                    maximum: r
                });
                break;
            case n !== null:
                if (e.length < Number(n)) Validate.fail(o);
                break;
            case r !== null:
                if (e.length > Number(r)) Validate.fail(u);
                break;
            default:
                throw new Error("Validate::Length - Length(s) to validate against must be provided!")
        }
        return true
    },
    Inclusion: function (e, t) {
        var t = t || {};
        var n = t.failureMessage || "Must be at least five characters long and include special characters and numbers";
        var r = t.caseSensitive === false ? false : true;
        if (t.allowNull && e == null) return true;
        if (!t.allowNull && e == null) Validate.fail(n);
        var i = t.within || [];
        if (!r) {
            var s = [];
            for (var o = 0, u = i.length; o < u; ++o) {
                var a = i[o];
                if (typeof a == "string") a = a.toLowerCase();
                s.push(a)
            }
            i = s;
            if (typeof e == "string") e = e.toLowerCase()
        }
        var f = false;
        for (var l = 0, u = i.length; l < u; ++l) {
            if (i[l] == e) f = true;
            if (t.partialMatch) {
                if (e.indexOf(i[l]) != -1) f = true
            }
        }
        if (!t.negate && !f || t.negate && f) Validate.fail(n);
        return true
    },
    Exclusion: function (e, t) {
        var t = t || {};
        t.failureMessage = t.failureMessage || "Please do not include numbers!";
        t.negate = true;
        Validate.Inclusion(e, t);
        return true
    },
    Confirmation: function (e, t) {
        if (!t.match) throw new Error("Validate::Confirmation - Error validating confirmation: Id of element to match must be provided!");
        var t = t || {};
        var n = t.failureMessage || "Passwords don't match!";
        var r = t.match.nodeName ? t.match : document.getElementById(t.match);
        if (!r) throw new Error("Validate::Confirmation - There is no reference with name of, or element with id of '" + t.match + "'!");
        if (e != r.value) {
            Validate.fail(n)
        }
        return true
    },
    Acceptance: function (e, t) {
        var t = t || {};
        var n = t.failureMessage || "Must be accepted!";
        if (!e) {
            Validate.fail(n)
        }
        return true
    },
    Custom: function (e, t) {
        var t = t || {};
        var n = t.against || function () {
                return true
            };
        var r = t.args || {};
        var i = t.failureMessage || "Website must include http://";
        if (!n(e, r)) Validate.fail(i);
        return true
    },
    now: function (e, t, n) {
        if (!e) throw new Error("Validate::now - Validation function must be provided!");
        var r = true;
        try {
            e(t, n || {})
        } catch (i) {
            if (i instanceof Validate.Error) {
                r = false
            } else {
                throw i
            }
        } finally {
            return r
        }
    },
    fail: function (e) {
        throw new Validate.Error(e)
    },
    Error: function (e) {
        this.message = e;
        this.name = "ValidationError"
    }
}